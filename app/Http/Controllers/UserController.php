<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Classes\Help;
use App\User;
use App\UserCompany;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /*  Index view
         *  Written by Harout Koja
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */


        if($company_id = Help::admin_user($request->input('token'))) {


            $request->input('limit') ? $limit = $request->input('limit') :  $limit = 10 ;
            $request->input('offset') ? $offset = $request->input('offset')-1 :  $offset = 0;

            // return users list
            $users = User::all();

            $users_filt = [];
            $i = 0;
            $j=0;

            foreach ($users as $user) {
                foreach ($user->users_companies as $company) {
                    $user->orders;
                    if ($company->company_id == $company_id && (++$j > $offset*$limit && $i < $limit) ) {
                        $users_filt[$i]['id'] = $user['id'];
                        $users_filt[$i]['username'] = $user['username'];
                        $users_filt[$i]['first_name'] = $user['first_name'];
                        $users_filt[$i]['last_name'] = $user['last_name'];
                        $users_filt[$i]['email'] = $user['email'];
                        $users_filt[$i]['address'] = $user['address'];
                        foreach ($user['users_companies'] as $status)
                            if ($status->company_id == $company_id) {
                                $users_filt[$i]['company_id'] = $status->company_id;
                                $users_filt[$i]['approved'] = $status->approved;
                                $users_filt[$i]['vip'] = $status->vip;
                            }
                        $users_filt[$i]['created_at'] = $user['created_at'];
                        $users_filt[$i]['updated_at'] = $user['updated_at'];
                        $i++;
                    }
                }
            }

            return  response()->json($users_filt);

        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*  store view
         *  Written by Harout Koja
         *  Date 29/Apr/2017
         *  Updated by
         *  Date
        */

        if($company_id = Help::admin_user($request->input('token'))) {

            $user = new User;
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->tel = $request->input('tel');
            $user->address = $request->input('address');
            $user->save();

            $status = new UserCompany;
            $status->user_id = $user->id;
            $status->company_id = $company_id;
            $request->input('approved') == 1 ? $status->approved = $request->input('approved') : $status->approved = null;
            $request->input('vip') == 1 ? $status->vip  = $request->input('vip') : $status->vip  = null;
            $status->save();

            return response()->json(['Message'=>'Success']);

        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request,$id)
    {
        /*  Show view
         *  Written by Harout Koja
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        if($company_id = Help::admin_user($request->input('token'))) {

            $user = User::find($id);
            $status= User::find($id);

            foreach ($status->users_companies as $status)
                if ($status->company_id == $company_id) {
                    $user['company_id'] = $status->company_id;
                    $user['approved'] = $status->approved;
                    $user['vip'] = $status->vip;
                }

            return response()->json($user);
        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        /*  update view
         *  Written by Harout Koja
         *  Date 29/Apr/2017
         *  Updated by
         *  Date
        */

        if($company_id = Help::admin_user($request->input('token'))) {

            $status = UserCompany::where('user_id',$id)->where('company_id',$company_id)->first();

            if($status) {

                $request->input('approved') == 1 ? $status->approved = $request->input('approved') : $status->approved = null;
                $request->input('vip') == 1 ? $status->vip = $request->input('vip') : $status->vip = null;
                $status->save();

                $user = User::find($id);
                $user->username = $request->input('username');
                $user->password = $request->input('password');
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->email = $request->input('email');
                $user->tel = $request->input('tel');
                $user->address = $request->input('address');
                $user->save();

                return response()->json(['Message' => 'Success']);
            }
            else
                return response()->json(['Error'=>'Out of your users permission range']);

        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //

    }


}
