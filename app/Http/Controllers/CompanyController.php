<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Classes\Help;
use App\Company;
use App\User;
use Carbon\Carbon;






class CompanyController extends Controller
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
         *  Date 21/Apr/2017
         *  Updated by
         *  Date
        */

        $request->input('limit') ? $limit = $request->input('limit') :  $limit = 10 ;
        $request->input('offset') ? $offset = $request->input('offset')-1 :  $offset = 0;

        // return companies  list
        $companies = Company::select('id','name','email','address','tel','website','image')->limit($limit)->offset($offset)->get();

        return  response()->json($companies);

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
          *  Date 25/Apr/2017
          *  Updated by
          *  Date
         */

        // check for root admin
        $token = $request->input('token');

        if(Help::root_user($token)) {
            $company = new Company;
            $company->username = $request->input('username');
            $company->password = $request->input('password');
            $company->email = $request->input('email');
            $company->name = $request->input('name');
            $company->address = $request->input('address');
            $company->image = $request->input('image');
            $company->tel = $request->input('tel');
            $company->website = $request->input('website');
            $company->license_key = Help::license_key();
            $company->from_date = $request->input('from_date');
            $company->to_date = $request->input('to_date');
            $company->save();

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
    public function show(Request $request, $id)
    {
        /*  Show view
         *  Written by Harout Koja
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        // check for root admin
        $token = $request->input('token');        

        if(Help::root_user($token) or Help::admin_user($token) == $id) {
            // return company full details
            $company = Company::find($id);
            return response()->json($company);
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

        // check for root admin
        $token = $request->input('token');

        if(Help::root_user($token)) {
            $company = Company::find($id);

            if($request->input('from_date') && $request->input('to_date')){
                $company->license_key = Help::license_key();
                $company->from_date = $request->input('from_date');
                $company->to_date = $request->input('to_date');
                $company->motherboard_key = null;
            }
            else {
                $company->username = $request->input('username');
                $company->password = $request->input('password');
                $company->email = $request->input('email');
                $company->name = $request->input('name');
                $company->address = $request->input('address');
                $company->image = $request->input('image');
                $company->tel = $request->input('tel');
                $company->website = $request->input('website');
            }

            $company->save();

            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function install(Request $request, $id)
    {

        $license_key = $request->input('license_key');
        $motherboard_key = $request->input('motherboard_key');

        $licence = Company::where('license_key',$license_key)->whereNull('motherboard_key')->
                   whereDate('from_date','<=',Carbon::today()->toDateString())->whereDate('to_date','>=',Carbon::today()->toDateString())->first();

        if($licence){
            $install =  Company::where('license_key',$license_key)->first();
            $install->motherboard_key = $motherboard_key;
            $install->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'License not valid or expired']);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        /*  login view
          *  Written by Harout Koja
          *  Date 25/Apr/2017
          *  Updated by
          *  Date
         */

        $username = $request->input('username');
        $password = $request->input('password');
        $motherboard_key = $request->input('motherboard_key');
        $token = $request->input('token');

        $company = Company::where('username',$username)->where('password',$password)->where('motherboard_key',$motherboard_key)->
                   whereDate('from_date','<=',Carbon::today()->toDateString())->whereDate('to_date','>=',Carbon::today()->toDateString())->first();

        if($company){
            $company->remember_token = $token;
            $company->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Invalid username or password']);


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        /*  login destroy view
         *  Written by Harout Koja
         *  Date 26/Apr/2016
         *  Updated by
         *  Date
        */
        $remember_token = $request->input('token');

        $company = Company::where('remember_token',$remember_token)->first();

        if($company){
            $company->remember_token = null;
            $company->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Please login first']);
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
