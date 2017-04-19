<?php

namespace App\Http\Controllers;

use Redirect;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Help;
use Auth;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        /*  login form view
         *  Written by Harout Koja
         *  Date 3/Jul/2016
         *  Updated by
         *  Date
        */
        
        if(Auth::check())
            return Redirect::to('/');
        else{
            return view('auth/login',['company'=>Help::company()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*  login info check
         *  Written by Harout Koja
         *  Date 3/Jul/2016
         *  Updated by
         *  Date
        */
        
        // check log in user and password
        $username  = Request::input('username');
        $password   = Request::input('password');

        if(Auth::attempt(['username'=>$username,'password'=>$password,'status'=>1])){
            // old url
            $old_url  = Session::get('url')['intended'];
            if($old_url)
                return ['data'=>$old_url];
            else
                return  ['data'=>url('/')];
        }
        else{
            return  Help::languages('Wrong username or password');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*  login  session close 
         *  Written by Harout Koja
         *  Date 3/Jul/2016
         *  Updated by
         *  Date
        */
        
        Auth::logout();
        Session::flush();

        return Redirect::to('auth/login');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
