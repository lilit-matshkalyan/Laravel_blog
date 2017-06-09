<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\Login;
use App\LogHistory;
use App\CompanyInfo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{


    public function index()
    {
        
        return view('user_login', []);

    }


    public function create(Request $request)
    {
        
    }

    ////////***** user login *****\\\\\\\\
    ////////*****http://localhost/apush/auth/login*****\\\\\\\\
    public function store(Request $request)
    {
        
        $username = $request->input('username');
        $password = $request->input('password');
    
        //jnjel shtap u qcel userControlleri mej
        if (Auth::attempt(['username'=>$username,'password'=>$password])) {

            return Redirect::to ("users/".Auth::user()->id); // redirect to UserController show function
        
        }
        else {
            $username = $request->old('username');
            $notice = 'Wrong username or password';
            return Redirect::back()->withErrors(['msg'=>$notice]);
            //return "error";
        }


        //{{ Auth::user()->name }}
        
    }


    public function register(Request $request)
    {

    }


    public function show(Request $request, $id)
    {

    }


    public function edit($id)
    {


    }


    public function update(Request $request, $id)
    {

    }


    public function destroy(Request $request, $id)
    {

    }


}
