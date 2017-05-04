<?php

namespace App\Http\Controllers;


use App\UserCompany;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Classes\Help;


use App\User;
use Mail;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        /*  login Index view
         *  Written by Harout Koja
         *  Date 26/Apr/2016
         *  Updated by
         *  Date
        */
        
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 2;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*  login store view
         *  Written by Harout Koja
         *  Date 26/Apr/2016
         *  Updated by
         *  Date
        */

        $username = $request->input('username');
        $password = $request->input('password');
        $remember_token = $request->input('token');

        $user = User::select('id','username','first_name','last_name','email','tel','address')->where('username',$username)->where('password',$password)->first();

        if($user){
            if($request->input('company_id')){
                $vip = UserCompany::where('company_id',$request->input('company_id'))->where('user_id',$user->id)->where('vip',1)->first();
                if(!$vip)
                    return response()->json(['Error'=>'Your account is not VIP']);
            }
            $user->remember_token = $remember_token;
            $user->save();
            return response()->json($user);
        }
        else
            return response()->json(['Error'=>'Invalid username or password']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        /*  login store view
         *  Written by Harout Koja
         *  Date 02/May/2016
         *  Updated by
         *  Date
        */

        $user= User::where('username',$request->input('username'))->first();
        if($user)
            return response()->json(['Error' => 'username Code must be unique']);
        $user= User::where('email',$request->input('email'))->first();
        if($user)
            return response()->json(['Error' => 'email Code must be unique']);

        $user = new User;

        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->tel = $request->input('tel');
        $user->address = $request->input('address');
        $user->save();

        if($request->input('company_id')){
            foreach ($request->input('company_id') as $i =>$item){
                $status = new UserCompany();
                $status->user_id = $user->id;
                $status->company_id = $item;
                $status->save();
            }
        }

        return response()->json(['Message'=>'Success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        /*  login show view
         *  Written by Harout Koja
         *  Date 03/May/2016
         *  Updated by
         *  Date
        */

        $user = User::where('remember_token',$request->input('token'))->first();

        if($user){
            return response()->json($user);
            }
        else {
            return response()->json(['Error' => 'Out of your users permission range']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 5;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /*  login destroy view
         *  Written by Harout Koja
         *  Date 26/Apr/2016
         *  Updated by
         *  Date
        */

        // reset password
        if ($request->input('email')) {

            $user = User::where('email', $request->input('email'))->first();
            if ($user) {
                $password = Help::license_key(8);
                $user->password = $password;

                $emails = $user->email;
                $body = 'Your account new password is  &nbsp; ' . $password;
                Mail::send([], [], function ($message) use ($emails, $body) {
                    $message->to($emails)->subject('Account New Password')->setBody($body, 'text/html');
                });

                $user->save();
                return response()->json(['Message' => 'Success']);
            }
            else {
                return response()->json(['Error' => 'Invalid Email']);
            }

        }
        // change password
        elseif($request->input('password') && $request->input('new_password')){

            $user = User::where('password', $request->input('password'))->where('remember_token',$request->input('token'))->first();
            if ($user) {
                $user->password = $request->input('new_password');
                $user->save();
                return response()->json(['Message' => 'Success']);
            }
            else {
                return response()->json(['Error' => 'Invalid Password']);
            }


        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        /*  login destroy view
         *  Written by Harout Koja
         *  Date 26/Apr/2016
         *  Updated by
         *  Date
        */

        $remember_token = $request->input('token');

        $user = User::where('remember_token',$remember_token)->first();

        if($user){
            $user->remember_token = null;
            $user->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Please login first']);
    }
}
