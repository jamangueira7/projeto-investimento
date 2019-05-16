<?php

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
//Route::get('/login', '');

/*
 * Routes for users
 * ==================================================
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', ['uses' => 'Controller@fazerLogin'])->middleware('checklogin');
Route::post('/login', ['as' => 'user.login','uses' => 'DashboardController@auth'])->middleware('checklogin');
Route::get('/logout', ['as' => 'user.logout','uses' => 'DashboardController@logout'])->middleware('checklogin');
Route::get('/dashboard', ['as' => 'user.dashboard','uses' => 'DashboardController@index'])->middleware('checklogin');

Route::get('user', ['as' => 'user.index','uses' => 'UsersController@index'])->middleware('checklogin');

Route::resource('user', 'UsersController')->middleware('checklogin');
Route::resource('instituition', 'InstituitionsController')->middleware('checklogin');
Route::resource('group', 'GroupsController')->middleware('checklogin');
Route::resource('instituition.product', 'ProductsController')->middleware('checklogin');

Route::get('/getback', ['as' => 'moviment.getback','uses' => 'MovimentsController@getback'])->middleware('checklogin');
Route::post('/getback', ['as' => 'moviment.getback.store','uses' => 'MovimentsController@storeGetback'])->middleware('checklogin');
Route::get('/moviment/user', ['as' => 'moviment.index','uses' => 'MovimentsController@index'])->middleware('checklogin');
Route::get('/moviment/all', ['as' => 'moviment.all','uses' => 'MovimentsController@all'])->middleware('checklogin');
Route::get('/moviment', ['as' => 'moviment.application','uses' => 'MovimentsController@application'])->middleware('checklogin');
Route::post('/moviment', ['as' => 'moviment.application.store','uses' => 'MovimentsController@store'])->middleware('checklogin');

Route::post('group/{group_id}/user',['as' => 'group.user.store', 'uses' => 'GroupsController@userStore'])->middleware('checklogin');
