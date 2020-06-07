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

Auth::routes();

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'PostsController@index')->middleware('auth');
Route::get('/post/create', 'PostsController@create')->middleware('auth')->name('post.create');
Route::get('/post/{post}', 'PostsController@show')->name('post.show');
Route::post('/post', 'PostsController@store')->middleware('auth')->name('post.store');

Route::get('/profile/{username}', 'ProfilesController@index')->name('profile.show');
Route::patch('/profile/{username}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{username}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{username}/following', 'ProfilesController@following');
Route::get('/profile/{username}/followers', 'ProfilesController@followers');
