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

// Route::GET('/', function () {
//     return view('welcome');
// });

Route::GET('/','ClientController@index')->name('index');

Auth::routes();

Route::GET('facebook/auth', 'SocialController@loginUsingFacebook')->name('facebook.login');
Route::GET('facebook/callback', 'SocialController@callbackFromFacebook')->name('facebook.callback');

Route::GET('google/auth', 'SocialController@loginUsingGoogle')->name('google.login');
Route::GET('google/callback', 'SocialController@callbackFromGoogle')->name('google.callback');

Route::GROUP(['prefix' => 'owner',  'middleware' => ['role:owner']], function(){
    Route::GET('/', 'OwnerController@index')->name('owner'); 

    Route::GET('blog','BlogController@index')->name('owner.blog');
    Route::GET('blog/new','BlogController@create')->name('owner.blog_new');
    Route::POST('blog/store','BlogController@store')->name('owner.blog_store');
    Route::POST('blog/update/{id}','BlogController@update')->name('owner.blog_update');
    Route::GET('blog/edit/{id}','BlogController@edit')->name('owner.blog_edit');
    Route::GET('blog/delete/{id}','BlogController@destroy')->name('owner.blog_delete');
    
    Route::GET('user','OwnerController@user')->name('owner.user');
    Route::GET('user/new','OwnerController@user_new')->name('owner.user_new');
    Route::POST('user/store','OwnerController@user_store')->name('owner.user_store');
    Route::POST('user/update/{id}','OwnerController@user_update')->name('owner.user_update');
    Route::GET('user/edit/{id}','OwnerController@user_edit')->name('owner.user_edit');
    Route::GET('user/delete/{id}','OwnerController@user_delete')->name('owner.user_delete');
    Route::GET('user/detail/{id}','OwnerController@user_detail')->name('owner.user_detail');

    Route::GET('event','OwnerController@event')->name('owner.event');
    Route::GET('event/new','OwnerController@event_new')->name('owner.event_new');
    Route::POST('event/store','OwnerController@event_store')->name('owner.event_store');
    

});

Route::GROUP(['prefix' => 'admin',  'middleware' => ['role:admin']], function(){
    Route::GET('/', 'AdminController@index')->name('admin'); 
    Route::GET('user','AdminController@user')->name('admin.user');
    Route::GET('user/detail/{id}','AdminController@user_detail')->name('admin.user_detail');
    
    Route::GET('blog','BlogController@index')->name('admin.blog');
    Route::GET('blog/new','BlogController@create')->name('admin.blog_new');
    Route::POST('blog/store','BlogController@store')->name('admin.blog_store');
    Route::POST('blog/update/{id}','BlogController@update')->name('admin.blog_update');
    Route::GET('blog/edit/{id}','BlogController@edit')->name('admin.blog_edit');

});

Route::GROUP(['prefix' => 'member',  'middleware' => ['role:member']], function(){
    Route::GET('/', 'HomeController@index')->name('member');
    Route::GET('exchange', 'HomeController@exchange')->name('member.exchange');
    Route::GET('stacking', 'HomeController@stacking')->name('member.stacking');
    Route::GET('lottery', 'HomeController@lottery')->name('member.lottery');
    Route::GET('investment', 'HomeController@investment')->name('member.investment');
    Route::GET('portofolio', 'HomeController@portofolio')->name('member.portofolio');
    Route::GET('contact', 'HomeController@contact')->name('member.contact');
    Route::GET('private-sale', 'HomeController@event')->name('member.event');
    Route::POST('private-sale/store', 'HomeController@event_store')->name('member.event_store');
    
    Route::GET('account', 'HomeController@account')->name('member.account');
    Route::POST('account/update', 'HomeController@account_update')->name('member.account_update');
    Route::POST('account/reset/password', 'HomeController@account_password')->name('member.account_password');

    Route::GET('blog', 'HomeController@blog')->name('member.blog');
    Route::GET('blog/view/{id}', 'HomeController@blog_view')->name('member.blog_view');
    Route::GET('blog/archive', 'HomeController@blog_archive')->name('member.blog_archive');
    Route::GET('blog/rearchive/{id}', 'HomeController@blog_rearchive')->name('member.blog_rearchive');
    
});
