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

Route::get('/', function () {
    return view('welcome');
});

//USERPAGE




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layout.dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'dashboard', 'namespace' => 'App\http\Controllers'], function () {
        route::get('/', 'DashboardController@index')->name('dashboard.index');
        //USER
        route::get('/users', 'UsersController@index')->name('dashboard.users.index');
        // route::get('/users/create', 'UsersController@create')->name('dashboard.users.create');
        // route::post('/users/store', 'UsersController@store')->name('dashboard.users.store');
        route::get('/users/delete/{id}', 'UsersController@destroy')->name('dashboard.users.delete');
        route::get('/users/edit/{id}', 'UsersController@edit')->name('dashboard.users.edit');
        route::post('/users/update/{id}', 'UsersController@update')->name('dashboard.users.update');
        route::get('/users/show/{id}', 'UsersController@show')->name('dashboard.users.show');

        //kinds
        route::get('/kind', 'kindController@index')->name('dashboard.kind.index');
        route::get('/kind/create', 'kindController@create')->name('dashboard.kind.create');
        route::post('/kind/store', 'kindController@store')->name('dashboard.kind.store');
        route::get('/kind/show/{id}', 'kindConkindtroller@show')->name('dashboard.kind.show');
        route::get('/kind/edit/{id}', 'kindController@edit')->name('dashboard.kind.edit');
        route::post('/kind/update/{id}', 'kindController@update')->name('dashboard.kind.update');
        route::get('/kind/delete/{id}', 'kindController@destroy')->name('dashboard.kind.delete');
        //post
        route::get('/post', 'PostController@index')->name('dashboard.post.index');
        route::get('/post/create', 'PostController@create')->name('dashboard.post.create');
        route::post('/post/store', 'postController@store')->name('dashboard.post.store');
        route::get('/post/show/{id}', 'postController@show')->name('dashboard.post.show');
        route::get('/post/edit/{id}', 'postController@edit')->name('dashboard.post.edit');
        route::post('/post/update/{id}', 'postController@update')->name('dashboard.post.update');
        route::get('/post/delete/{id}', 'postController@destroy')->name('dashboard.post.delete');
          //logout
        route::get('/logout', 'UsersController@logout')->name('dashboard.users.logout');


        ///
        route::get('/index', 'FrontController@index')->name('dashboard.frontpage.index');
        route::get('/show/{id}','FrontController@show')->name('dashboard.frontpage.show');
        route::get('/view/{id}','FrontController@view')->name('dashboard.frontpage.view');
        Route::get('/search/', 'FrontController@search')->name('search');
        route::get('/view/{id}','FrontController@view')->name('dashboard.frontpage.view');
    });



});
