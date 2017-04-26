<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Classes\Help;


use App\User;


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

        $user = User::where('username',$username)->where('password',$password)->first();

        if($user){
            $user->remember_token = $remember_token;
            $user->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Invalid username or password']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return 4;
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
        //
        return 6;
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
