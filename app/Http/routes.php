<?php


use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
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


/*  login Controller
 *  Written by Harout Koja
 *  Date 3/Jul/2016
 *  Updated by
 *  Date
*/
Route::resource('auth/login', 'LoginController');


/*  Index Controller
 *  Written by Harout Koja
 *  Date 1/Jun/2016
 *  Updated by
 *  Date
*/
Route::resource('/', 'IndexController');


/*  Job Controller
 *  Written by Harout Koja
 *  Date 15/Jun/2016
 *  Updated by
 *  Date
*/
Route::resource('jobs', 'JobController');


/*  Employee Controller
 *  Written by Harout Koja
 *  Date 20/Jun/2016
 *  Updated by
 *  Date
*/
Route::resource('employees', 'EmployeeController');


/*  Languages Controller
 *  Written by Harout Koja
 *  Date 27/Jun/2016
 *  Updated by
 *  Date
*/
Route::resource('languages', 'LanguagesController');



/*  Ajax Controller
 *  Written by Harout Koja
 *  Date 15/Jul/2016
 *  Updated by
 *  Date
*/
Route::resource('ajax', 'AjaxController');