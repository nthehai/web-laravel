<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/', function () {
    return view('layout');

});

//Backend
Route::get('admin','AdminController@index');
Route::get('dashboard','AdminController@show_dashboard');
Route::post('admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@log_out');


//School
Route::get('/edit-school/{school_userid}','SchoolController@edit_school');
Route::get('/delete-school/{school_id}','SchoolController@delete_school');

Route::get('/all-school','SchoolController@all_school');
Route::get('/add-school','SchoolController@add_school');

Route::get('/unactive-school/{school_id}','SchoolController@unactive_school');
Route::get('/active-school/{school_id}','SchoolController@active_school');

Route::post('/save-school','SchoolController@save_school');
Route::post('/update-school/{school_id}','SchoolController@update_school');

//User
Route::get('/edit-user/{user_id}','UserController@edit_user');
Route::get('/delete-user/{user_id}','UserController@delete_user');

Route::get('/all-user','UserController@all_user');
Route::get('/add-user','UserController@add_user');

Route::post('/save-user','UserController@save_user');
Route::post('/update-user/{user_id}','UserController@update_user');


