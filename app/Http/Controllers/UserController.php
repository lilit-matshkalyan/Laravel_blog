<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Paginator;
use App\Http\Requests\UserRequest;
use App\Classes\Help;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $users = User::all('user_id','user_name','type','created_at');
        return  view('user.index',['users'=>$users,'user'=>Help::me()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return Redirect::to('user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        //
        $user = new User;
        $user->user_name = $request->input('user_name');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type');
        $user->save();
        return Redirect::to('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        return Redirect::to('user');
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
        return Redirect::to('user');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        $user  = User::find($id);
        $user->user_name = $request->input('user_name');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type');
        $user->save();
        return Redirect::to('user');
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
        $user = User::find($id);
        $user->delete();
        return Redirect::to('user');
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
