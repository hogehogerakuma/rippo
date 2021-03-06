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

Route::get('/', 'ReportsController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::resource('reports', 'ReportsController');
    
    Route::get('reports/{id}/favoriters', 'ReportsController@favoriters')->name('reports.favoriters');
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
        
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('favoriters/{thatday_date}', 'UsersController@favoriters')->name('users.favoriters');
    
        Route::post('comment', 'UserCommentController@store')->name('user.comment');
        Route::delete('uncomment', 'UserCommentController@destroy')->name('user.uncomment');
        
        Route::get('comments' , 'UserCommentController@show')->name('users.comments');
        Route::get('calendar' , 'CommonsController@show')->name('commons.calendar');
        
        Route::get('comments/{thatday_date}', 'UserCommentController@index')->name('reports.comments');
        Route::get('report/{thatday_date}', 'ReportsController@thatday_report')->name('users.report');
       
        Route::get('reports' , 'ReportsController@reportsFromUser')->name('reports.reports');
        Route::get('graphs' , 'ReportsController@graphs')->name('users.other');
        
        Route::get('feed' , 'ReportsController@indextwo')->name('users.feed');
    });
});