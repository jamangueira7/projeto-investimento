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

Route::get('/login', 'Controller@fazerLogin');
Route::post('/login', ['as' => 'user.login','users' => 'Controller@login']);

