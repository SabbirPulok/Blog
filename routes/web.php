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


Route::group(['middleware'=>['web']],function (){
    //Authentication routes
    Route::get('login',[
        'as' => 'login',
         'uses'=>'Auth\LoginController@showLoginForm'
        ]);
    Route::post('login',[
        'as' => '',
        'uses'=>'Auth\LoginController@login'
    ]);
    Route::get('logout',[
        'as' => 'logout',
        'uses'=>'Auth\LoginController@logout'
    ]);
    Route::post('users/logout','Auth\LoginController@userLogout')->name('user.logout');

    //Registration Users
   Route::get('register',[
       'as'=>'register',
       'uses'=>'Auth\RegisterController@showRegistrationForm'
   ]);
    Route::post('register',[
        'as'=>'',
        'uses'=>'Auth\RegisterController@register'
    ]);
    //Passwords Reset Routes
    Route::post('password/email',[
        'as'=>'password.email',
        'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::get('password/reset',[
        'as' => 'password.request',
        'uses'=>'Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::post('password/reset',[
        'as'=>'',
        'uses'=>'Auth\ResetPasswordController@reset'
    ]);
    Route::get('password/reset/{token}',[
        'as'=>'password.reset',
        'uses'=>'Auth\ResetPasswordController@showResetForm'
    ]);
    //admin
    Route::prefix('admin')->group(function(){
        Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/','AdminController@index')->name('admin.dashboard');
        Route::get('/{post}','AdminController@show')->name('admin.show');
        Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
        Route::post('password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/reset','Auth\AdminResetPasswordController@reset');
        Route::get('password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name("admin.password.reset");
    });

    //categories
    Route::resource('categories','CategoryController',['except'=>['create']]);
    //tags
    Route::resource('tags','TagController',['except'=>['create']]);

    Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex']);
    //domain.com/blog/slug-goes-here
   Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');

    Route::get('/','PagesController@getIndex');
    Route::get('about','PagesController@getAbout');
    Route::get('contact','PagesController@getContact');
    Route::resource('posts','PostController');

});