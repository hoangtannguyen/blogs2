<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','IndexController@index')->name('index.index');
Route::get('/details/{id}','IndexController@details')->name('index.details');
Route::get('/search','IndexController@search')->name('index.search');
Route::get('/trending','IndexController@trending')->name('index.trending');
Route::get('/search','IndexController@search')->name('index.search');
Route::get('/user_post','IndexController@user_post')->name('index.user_post');
Route::post('/contact','IndexController@contact')->name('index.contact');


Route::view('admin', 'front_end.user_details.index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/test','BlogController@test')->name('blog.index');
Route::get('/view_index','BlogController@view_index')->name('blog.view_index');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/view','BlogController@view')->name('blog.view');
    Route::get('/index','BlogController@index')->name('blog.index');
    Route::get('/create','BlogController@create')->name('blog.create');
    Route::get('/roleSelect','BlogController@selectRole')->name('blog.roleSelect');
    Route::post('/post','BlogController@store')->name('blog.store');
    Route::get('/edit/{id}','BlogController@edit')->name('blog.edit');
    Route::post('/put/{id}','BlogController@update')->name('blog.update');
    Route::get('/show/{id}',"BlogController@show")->name('blog.show');
    Route::post('delete/{id}','BlogController@destroy')->name('blog.destroy');
    Route::get('/search','BlogController@getSearch')->name('blog.search');
    Route::get('/category/{id}',"BlogController@searchcate")->name('blog.category');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/view','CategoriesController@view')->name('category.view');
    Route::get('/index','CategoriesController@index')->name('category.index');
    Route::get('/create','CategoriesController@create')->name('category.create');
    Route::post('/post','CategoriesController@store')->name('category.store');
    Route::get('/edit/{id}','CategoriesController@edit')->name('category.edit');
    Route::put('/put/{id}','CategoriesController@update')->name('category.update');
    Route::delete('delete/{id}','CategoriesController@destroy')->name('category.destroy');
    Route::get('/trash', "CategoryController@getTrash")->name('category.getTrash');
    Route::get('/{id}/trash', "CategoryController@findTrashById")->name('category.findTrashById');
    Route::delete('/{id}', "CategoryController@moveToTrash")->name('category.moveToTrash');
    Route::put('/{id}/restore', "ChucvuController@restore")->name('category.restore');

});


Route::group(['prefix' => 'user'], function () {
    Route::get('/view','UserController@view')->name('user.view');
    Route::get('/index','UserController@index')->name('user.index');
    Route::get('/create','UserController@create')->name('user.create');
    Route::post('/post','UserController@store')->name('user.store');
    Route::get('/edit/{id}','UserController@edit')->name('user.edit');
    Route::post('/put/{id}','UserController@update')->name('user.update');
    Route::post('delete/{id}','UserController@destroy')->name('user.destroy');
    Route::get('/selectRole','UserController@selectRole')->name('user.selectRole');

});


Route::group(['prefix' => 'role_user'], function () {
    Route::get('/view','RoleUserController@view')->name('role_user.view');
    Route::get('/index','RoleUserController@index')->name('role_user.index');
    Route::get('/create','RoleUserController@create')->name('role_user.create');
    Route::post('/post','RoleUserController@store')->name('role_user.store');
    Route::get('/edit/{id}','RoleUserController@edit')->name('role_user.edit');
    Route::put('/put/{id}','RoleUserController@update')->name('role_user.update');
    Route::post('delete/{id}','RoleUserController@destroy')->name('role_user.destroy');
});


Route::group(['prefix' => 'UserPost'], function () {
    Route::get('/index','UserPostController@index')->name('UserPost.index');
    Route::get('/create','UserPostController@create')->name('UserPost.create');
    Route::post('/post','UserPostController@store')->name('UserPost.store');
    Route::get('/edit/{id}','UserPostController@edit')->name('UserPost.edit');
    Route::put('/put/{id}','UserPostController@update')->name('UserPost.update');
    Route::get('/show/{id}',"UserPostController@show")->name('UserPost.show');
    Route::post('delete/{id}','UserPostController@destroy')->name('UserPost.destroy');
    Route::get('/search','UserPostController@search')->name('UserPost.search');
    Route::get('/details/{id}','UserPostController@details')->name('UserPost.details');
});



