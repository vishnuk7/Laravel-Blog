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
    return view('welcome');
});


Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);

    Route::get('/post/create','PostsController@create')->name('post.create');

    Route::post('/post/store',[
        'uses'=>'PostsController@store',
        'as'=>'post.store'
    ]);

    Route::get('/post',[
        'uses'=>'PostsController@index',
        'as'=>'post'
    ]);

    Route::get('/post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);


    Route::get('/category',[
        'uses'=>'CategoryController@index',
        'as'=>'category'
    ]);

    Route::get('/category/create',[
        'uses'=>'CategoryController@create',
        'as'=>'category.create'
    ]);

    Route::post('/category/store',[
        'uses'=>'CategoryController@store',
        'as'=>'category.store'
    ]);

    Route::get('/category/edit/{id}',[
        'uses'=>'CategoryController@edit',
        'as'=>'category.edit'
    ]);

    Route::get('/category/delete/{id}',[
        'uses'=>'CategoryController@destroy',
        'as'=>'category.delete'
    ]);

    Route::post('/category/update/{id}',[
        'uses'=>'Categorycontroller@update',
        'as'=>'category.update'
    ]);
});


