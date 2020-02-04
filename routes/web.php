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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
             Route::resource('blog-posts','BlogPostController');//expect
             Route::resource('subscribers','SubscriberController');
            });
Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/sendhtmlemail','MailController@html_email');