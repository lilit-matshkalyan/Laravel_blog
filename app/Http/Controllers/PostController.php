<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class PostController extends Controller
{


    public function index(Request $request)
    {

        $posts = Post::All();

        return view('posts_list',['posts'=>$posts]);

    }

    ////////***** add a post *****\\\\\\\\
    ////////*****http://localhost/apush/*****\\\\\\\\
    public function create()
    {
        //$users = User::All();

        if (Auth::check())
        {
            // The user is logged in...
            $user = Auth::user(); //User::find($id);
            return view('post_add', ['user'=>$user]);
        }

        //return view('post_add',[/*'users'=>$users*/]);

        //erb miayn login exatc mardik karoxanan avelacnel poster
        //return view('post_add',[]);

    }

    ////////***** save added post *****\\\\\\\\
    ////////*****http://localhost/apush/*****\\\\\\\\
    public function store(Request $request)
    {



        $this->validate($request,[

            'title' => 'required|min:6|max:50',
            'content'  => 'required|min:30|max:1000',
            //'confirm_password' => 'required|min:3|max:20|same:password',
        ],[
            'title.required' => ' The title field is required.',
            'title.min'      => ' The title must be at least 6 characters.',
            'title.max'      => ' The title may not be greater than 50 characters.',

            'content.required'  => ' The content field is required.',
            'content.min'       => ' The content must be at least 30 characters.',
            'content.max'       => ' The content may not be greater than 1000 characters.',
        ]);



        /*$user = User::find($id);
        $post = new post;
        //$user =
        $post->author_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->save();
        return Redirect::to ("posts"); //users/$user->id
        */
        $id = Auth::user()->id;
        /*
        //* chpetqakan bayc petqakan *\\
        $currentuser = User::find($id);
        $usergroup = $currentuser->user_group;
        $group = Sentry::getGroupProvider()->findById($usergroup);

        $generatedPassword = $this->_generatePassword(8,8);
        $user = Sentry::register(array('email' => $input['email'], 'password' => $generatedPassword, 'user_group' => $usergroup));

        $user->addGroup($group);
        */


        $user = User::find($id);
        $post = new post;

        $post->author_id = $id;
        //return $user;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();



        return Redirect::to ("users/$user->id");



        /*$username = $post->username;
        $passwd = $post->author_id;
        $pass = $passwd->password;

        if ($pass == $request->input('password')) {
            $post->save();
            return Redirect::to ("posts");
        } else {
            //imap_alerts("Your password is incorrect to add a post");
            return Redirect::to ("users");
        }*/


    }


    public function show($id)
    {

        $post = Post::Find($id);
        $post->user;
        return $post;


        //erb miayn login exatc mardik karoxanan avelacnel poster
        /*$post = Post::Find($id);
        return $post;*/
    }


    public function edit($id)
    {
        
        
        $post = Post::find($id);
        $users = User::All();
        return view('post_edit', ['post' => $post, 'users'=>$users]); //'post' => $post, 'users'=>$users


        $user = User::find($id);
        return view('user_edit', ['user' => $user]);


        //erb miayn login exatc mardik karoxanan avelacnel poster
        /*$post = Post::find($id);
      
        return view('post_edit', ['post' => $post]);*/

    }


    public function update(Request $request, $id)
    {

        $this->validate($request,[

            'title' => 'required|min:6|max:35',
            'content'  => 'required|min:35|max:1000',
            //'confirm_password' => 'required|min:3|max:20|same:password',
        ],[
            'title.required' => ' The title field is required.',
            'title.min'      => ' The title must be at least 6 characters.',
            'title.max'      => ' The title may not be greater than 50 characters.',

            'content.required'  => ' The content field is required.',
            'content.min'       => ' The content must be at least 30 characters.',
            'content.max'       => ' The content may not be greater than 1000 characters.',
        ]);
        
        
        $user_id = Auth::user();
        //$user = User::find($id);
        $post = Post::find($id);


        //return $user;
        $post->author_id = $user_id->id;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();



        return Redirect::to ("users/$user_id->id");
        

        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');

        $user->save();

        return Redirect::to ("users/$user->id");
        return "update | it works ";

    }


    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $post = Post::find($id);
        $post->delete();
        return Redirect::to ("users/$user_id");

    }


}
