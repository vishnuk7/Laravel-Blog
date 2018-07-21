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

    Route::get('/post/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'=>'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
    ]);


    Route::get('/post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);

    Route::get('/post/trashed',[
        'uses'=>'PostsController@trashed',
        'as'=>'post.trashed'
    ]);

    Route::get('/post/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'=>'post.kill'
    ]);

    Route::get('/post/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'=>'post.restore'
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

    Route::get('/tags',[
        'uses'=>'Tagscontroller@index',
        'as'=>'tags'
    ]);

    Route::get('/tag/create',[
        'uses'=>'Tagscontroller@create',
        'as'=>'tag.create'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses'=>'Tagscontroller@edit',
        'as'=>'tag.edit'
    ]);

    Route::post('/tag/update/{id}',[
        'uses'=>'Tagscontroller@update',
        'as'=>'tag.update'
    ]);

    Route::post('/tag/store',[
        'uses'=>'Tagscontroller@store',
        'as'=>'tag.store'
    ]);

    Route::get('/tag/delete/{id}',[
        'uses'=>'Tagscontroller@destroy',
        'as'=>'tag.delete'
    ]);

});


