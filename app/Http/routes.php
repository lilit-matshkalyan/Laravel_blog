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



/*  Index Controller
 *  Written by Harout Koja
 *  Date 20/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('auth/login', 'LoginController');


/*  Index Controller
 *  Written by Harout Koja
 *  Date 20/Apr/2017
 *  Updated by
 *  Date
*/
Route::resource('/', 'IndexController');


