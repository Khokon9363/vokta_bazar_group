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
// frontend views

use App\Social;

Route::get('/', function () {
    if(count(Social::all()) != 0 ){
        $socials = \App\Social::all()[0];
        return view('voktabazar.voktabazar',compact('socials'));   
    }
})->name('/');
Route::get('/about', function () {
    if(count(Social::all()) != 0 ){
        $socials = \App\Social::all()[0];
        return view('voktabazar.voktabazar',compact('socials'));
    }
});
Route::get('/contact', function () {
    if(count(Social::all()) != 0 ){
        $socials = \App\Social::all()[0];
        return view('voktabazar.voktabazar',compact('socials'));   
    }
});
// authentication
Auth::routes();

// they all are under auth middleware like HomeController
// routes for vueJS
    Route::get('/home', 'HomeController@index');
    Route::get('/live_chat', 'HomeController@index');
    Route::get('/manage_blogs', 'HomeController@index');
    Route::get('/social_links', 'HomeController@index');
    Route::get('/emails', 'HomeController@index');
    Route::get('/about_us', 'HomeController@index');
    Route::get('/users', 'HomeController@index');
    Route::get('/profile', 'HomeController@index');
// users list
    Route::get('/get_users', 'HomeController@getUsers');
    Route::get('/delete_user/{id}', 'HomeController@deleteUser');
    Route::get('/deactive_user/{id}', 'HomeController@deactiveUser');
    Route::get('/active_user/{id}', 'HomeController@activeUser');
// about
    Route::post('save_about', 'AboutController@saveAbout');
// social links
    Route::get('/get_links', 'SocialController@getLinks');
    Route::post('save_links', 'SocialController@saveLinks');
// mail from frontEnd
    Route::post('send_mail', 'EmailController@sendMail');
// mail
    Route::get('/get_emails', 'EmailController@getEmails');
    Route::get('/delete_email/{id}', 'EmailController@deleteEmail');
// profile
    Route::get('/get_profile', 'HomeController@getProfile');
    Route::post('update_profile', 'HomeController@updateProfile');
// blog
    Route::get('/get_blogs', 'BlogController@getBlogs');
    Route::post('save_blog', 'BlogController@saveBlog');
    Route::get('/delete_blog/{id}', 'BlogController@deleteBlog');
    Route::get('/active_blog/{id}', 'BlogController@activeBlog');
    Route::get('/deactive_blog/{id}', 'BlogController@deactiveBlog');

// frontend view
Route::get('/get_blogs_front', 'BlogController@publishedBlogs');
Route::get('/get_about', 'AboutController@getAbout');

// acc status
Route::get('/key_code','HomeController@keyCode');
Route::post('/send/key_code','HomeController@sendKeyCode');

// chat
Route::get('all/users','ChatController@allUsers');
Route::get('all/chats/{id}','ChatController@allChats');
Route::post('chat/send','ChatController@send');