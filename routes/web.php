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
    // return view('welcome');
    return redirect()->route('blog-posts.index');
});

Auth::routes();

Route::get('/home', 'BlogPostController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
             
            
            });
Route::resource('blog-posts','BlogPostController');//expect
Route::resource('subscribers','SubscriberController');
Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/sendhtmlemail','MailController@html_email');
Route::get('/confirmationcode','SubscriberController@confirmation_code');
// Route::resource('authors','AuthorController');
Route::get('authors','AuthorController@index')->name('authors');
Route::get('authors/delete/{id}','AuthorController@destroy')->name('author-delete');

Route::post('mail-confirmation','SubscriberController@confirmation')->name('mail.confirmation');
Route::post('comment','CommentController@store');