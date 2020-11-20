<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','FrontendController@index')->name('frontend.index');
//Route::get('/feedback','FrontendController@fonts')->name('frontend.font');




Auth::routes();

Route::group(['prefix' => 'dashboard','middleware'=>['auth','admin']],function (){
    Route::post('/','DashboardController@index')->name('dashbord.index');
    Route::resource('/user','UsernameController');
    Route::resource('/personal','PersonalDetailController');

});

Route::get('/home', 'HomeController@index')->name('home');
