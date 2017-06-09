<?php


use App\Http\Requests;




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


Route::resource('/', 'IndexController');


Route::resource('users', 'UserController');


Route::resource('posts', 'PostController');


Route::resource('auth/login', 'LoginController');