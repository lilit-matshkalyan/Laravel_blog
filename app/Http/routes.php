<?php


use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Classes\Help;



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|SELECT MONTH(created_at),COUNT(products_id) FROM products GROUP BY MONTH(created_at)
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*  Index Controller
 *  Written by Harout Koja
 *  Date 20/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('api/login', 'LoginController');


/*  Login Controller
 *  Written by Harout Koja
 *  Date 26/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('/', 'IndexController');



/*  Company Controller
 *  Written by Harout Koja
 *  Date 21/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('api/companies', 'CompanyController');



/*  Category Controller
 *  Written by Harout Koja
 *  Date 25/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('api/categories', 'CategoryController');


/*  Location Controller
 *  Written by Harout Koja
 *  Date 25/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('api/locations', 'LocationController');


/*  Location Controller
 *  Written by Harout Koja
 *  Date 25/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('api/users', 'UserController');


/*  Orders Controller
 *  Written by Harout Koja
 *  Date 26/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('api/orders', 'OrderController');

