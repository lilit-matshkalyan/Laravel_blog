<?php

namespace App\Http\Controllers;

//use App\Http\Hash;

use Auth;
use Hash;
use Session;
use GuzzleHttp\Client;
use App\User;
use App\Post;
use App\LogHistory;
use App\CompanyInfo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;





class UserController extends Controller
{
    public function index()
    {


        /*$json = '{
   "profiles":[
      {
         "id":"d2501196e8ed4d729b3727dc64989431",
         "name":"infiniman"
      }
   ],
   "size":1
}';

        $obj = json_decode($json);

        return $obj->profiles[0]->id;*/

/*
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://ipinfo.io/json',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $obj = json_decode(json_encode( $client ), true );
        //json_encode($client);

        //echo $client . '(' . json_encode($obj )  . ');';


        echo $obj[0]['country'] ;

        //echo $_GET['jsoncallback'] . '(' . json_encode($answer )  . ');';





        return $obj->country;
        //print_r($client);
*/

        // Get IP address
        $ip_address = "212.42.200.182"; //getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
echo $ip_address;
// Get JSON object
        $jsondata = file_get_contents("http://timezoneapi.io/api/ip/?" . $ip_address);

// Decode
        $data = json_decode($jsondata, true);

// Request OK?
        if($data['meta']['code'] == '200'){

            // Example: Get the city parameter
            echo "City: " . $data['data']['country'] . "<br>";

            // Example: Get the users time
            echo "Time: " . $data['data']['datetime']['date_time_txt'] . "<br>";

        }

        $users = User::All();

        return view('user_list',['users'=>$users, ]);

    }


    ////////*****user register*****\\\\\\\\
    ////////*****http://localhost/apush/users/create*****\\\\\\\\

    public function create(Request $request)
    {
        //$user = User::Find($id);
        return view('user_register', []);
        //return view('user_register', ['user' => $user]);

        //return "UserController create";
        /*if (Auth::attempt(['username'=>$request->input('username'),'password'=>$request->input('password')])) {
            if (Auth::check())
            {
                // The user is logged in...
                $user = Auth::user(); //User::find($id);
                return view('user_account', ['user' => $user]);
            }
        }
        else {
            //
        }*/
        //return view('user_register',[]);

    }

    ////////*****save user data register*****\\\\\\\\

    public function store(Request $request)
    {

        $this->validate($request,[

            'firstname' => 'required|min:6|max:255',
            'lastname'  => 'required|min:6|max:255',
            'username'  => 'required|min:6|max:255|unique:users',
            'password'  => 'required|min:6|max:255',
            'email'     => 'required',
            //'confirm_password' => 'required|min:3|max:20|same:password',
        ],[
            'firstname.required' => ' The firstname field is required.',
            'firstname.min'      => ' The firstname must be at least 6 characters.',
            'firstname.max'      => ' The firstname may not be greater than 20 characters.',

            'lastname.required'  => ' The lastname field is required.',
            'lastname.min'       => ' The lastname must be at least 6 characters.',
            'lastname.max'       => ' The lastname may not be greater than 30 characters.',

            'username.required'  => ' The username field is required.',
            'username.min'       => ' The username must be at least 6 characters.',
            'username.max'       => ' The username may not be greater than 20 characters.',
            'username.unique'    => ' The username must be unique.',

            'password.required'  => ' The password field is required.',
            'password.min'       => ' The password must be at least 6 characters.',
            'password.max'       => ' The password may not be greater than 20 characters.',

            'email.required'     => ' The email field is required.',
            'email.min'          => ' The email field must be like email.',
        ]);


        //dd('You are successfully added all fields.');

        //return "UserController store";
        $user = new user;
        //$pass = new password;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        //$user->password = Hash::make('secret');
        //$pass = Hash::make('secret');

        $user->email = $request->input('email');
        $user->save();
        //return Redirect::to ("users");
        //return view('user_login', ['user' => $user]);

        return Redirect::to ("auth/login");

        /*
        $data =  array(
            $request->input('firstname'),
            $request->input('lastname'),
            $request->input('username'),
            Hash::make($request->input('password')),
            $request->input('email')
        );

        //$fileArray = ['image' => $file];
        //$rules = ['image' => 'required|min:6|max:20'];
        $validator = Validator::make($data, [
            'firstname' => 'required|max:20',
            'lastname'  => 'required|max:30',
            'username'  => 'required|unique:users|max:20',
            'password'  => 'recuired|confirmed|min:6',
            'email'     => 'required|email|max:50',
        ]);
        if ($validator->fails()) {
            return ['Error' => 'Invalid data'];
        } else {
            //return "UserController store";
            $user = new user;
            //$pass = new password;
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            //$user->password = Hash::make('secret');
            //$pass = Hash::make('secret');

            $user->email = $request->input('email');
            $user->save();
            //return Redirect::to ("users");
            //return view('user_login', ['user' => $user]);


        }
        
        */
        
        
        

    }

    ////////***** user account page *****\\\\\\\\
    ////////*****http://localhost/apush/users/userId*****\\\\\\\\
    public function show(Request $request, $id)
    {
        //return "UserController show";

        $user = User::Find($id);
        $posts = Post::All();

        //$allPost = Post::with('posts')->where('author_id', $id)->get();

        $user = User::find($id);
        $posts = Post::where("author_id", "=", $user->id)->get();

        return view('user_account', ['user' => $user, 'posts' => $posts]);


        return view('user_account', ['user' => $user, 'posts' => $allPost]); //$allPost;

        //return Redirect::to ("users/".Auth::user()->id);





        /*
                $user = User::Find($id);

                $userPosts = Post::whereHas('posts', function($query) use ($user) {
                    return $query->where('author_id', $user->id);
                })
                    ->first();

                $authUser = Auth::user();
                $authLikedPosts = Post::whereHas('posts', function($query) use ($authUser) {
                    return $query->where('author_id', $authUser->id);
                })
                    ->whereIn('id', $userPosts->lists('id'))
                    ->first();

                return view('user_account', ['user' => $user, 'posts' => $authLikedPosts]);
        */

        //$author_id[] = $post->author_id;

        /*$user = User::Find($id);

        $userPosts = Post::whereHas('posts', function($query) use ($user) {
            return $query->where('author_id', $user->id);
        })
            ->first();

        $authUser = Auth::user();
        $authLikedPosts = Post::whereHas('posts', function($query) use ($authUser) {
            return $query->where('author_id', $authUser->id);
        })
            ->whereIn('id', $userPosts->lists('id'))
            ->first();

        return view('user_account', ['user' => $user, 'posts' => $authLikedPosts]);*/

        /*$user = User::Find($id);
        $allPost = Post::with('posts')->where('author_id', $id)->first();
        return view('user_account', ['user' => $user, 'posts' => $allPost]); //$allPost;*/





        //$posts = Post::All();

        //return view('posts_list',['posts'=>$posts]);

        //return view('user_register', ['user' => $user]);

        //return $user;

    }


    ////////***** user data edit *****\\\\\\\\
    ////////*****http://localhost/apush/users/userId/edit*****\\\\\\\\

    public function edit($id)
    {
        //return "UserController edit";
        $user = User::find($id);
        return view('user_edit', ['user' => $user]);

    }

    ////////***** save user data edit *****\\\\\\\\
    ////////*****http://localhost/apush/users/userId*****\\\\\\\\

    public function update(Request $request, $id)
    {


        $this->validate($request,[

            'firstname' => 'required|min:6|max:255',
            'lastname'  => 'required|min:6|max:255',
            //'username'  => 'required|min:6|max:255|unique:users,username'. $this->get('id') .',id',
            'username'  => 'required|min:6|max:255|unique:users,username,'.$id.',id',

            'password'  => 'required|min:6|max:255',
            'email'     => 'required',
            //'confirm_password' => 'required|min:3|max:20|same:password',
        ],[
            /*'firstname.required' => ' The firstname field is required.',
            'firstname.min'      => ' The firstname must be at least 6 characters.',
            'firstname.max'      => ' The firstname may not be greater than 20 characters.',

            'lastname.required'  => ' The lastname field is required.',
            'lastname.min'       => ' The lastname must be at least 6 characters.',
            'lastname.max'       => ' The lastname may not be greater than 30 characters.',

            'username.required'  => ' The username field is required.',
            'username.min'       => ' The username must be at least 6 characters.',
            'username.max'       => ' The username may not be greater than 20 characters.',
            'username.unique'    => ' The username must be unique.',

            'password.required'  => ' The password field is required.',
            'password.min'       => ' The password must be at least 6 characters.',
            'password.max'       => ' The password may not be greater than 20 characters.',

            'email.required'     => ' The email field is required.',
            'email.min'          => ' The email field must be like email.',*/
        ]);



        //return "UserController update";
        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');

        $user->save();

        return Redirect::to ("users/$user->id");
        // http://localhost/apush/users/35 //////////////////////////////////////////////////////////////////////////////////////
        //return Redirect::to ("users");
        //return redirect()->route("index");

    }

    ////////***** user login redirect from Login Controller store() *****\\\\\\\\
    ////////*****http://localhost/apush/users/userId/edit*****\\\\\\\\

    public function status(Request $request, $id)
    {
        //stugel petqa te che
        return Redirect::to ("user_login");

    }

    //
    // user jnjelu hamar, petq chi, "but" hanel //
    //
    public function destroy($id)
    {
        $user = User::find($id);
        Session::flush($user);

        return Redirect::to ("auth/login");

        /*$user = User::find($id);
        $user->delete();*/

/*
        $user = User::find($id);
        $user->delete();


        return Redirect::to ("users");
*/
        //$user->forceDelete();

        //return Redirect::to ("users");

    }

/*
    public function __construct() {
        $this->middleware('auth');


        $this->middleware('auth');

        $this->middleware('log', ['only' => [
            'fooAction',
            'barAction',
        ]]);

        $this->middleware('subscribed', ['except' => [
            'fooAction',
            'barAction',
        ]]);
    }
*/
/*    public function __construct() {
        $this->middleware('auth');
   
   
        $this->middleware('auth');

        $this->middleware('log', ['only' => [
            'fooAction',
            'barAction',
        ]]);

        $this->middleware('subscribed', ['except' => [
            'fooAction',
            'barAction',
        ]]);
   
   
    }
*/

}
