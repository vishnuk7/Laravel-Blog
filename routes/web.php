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

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/post/{slug}',[
    'uses'=>'FrontEndController@singlePost',
    'as'=>'post.single'
]);

Route::get('/category/{id}',[
    'uses'=>'FrontEndController@category',
    'as'=>'category.single'
]);

Route::get('/tag/{id}',[
    'uses'=>'FrontEndController@tag',
    'as'=>'tag.single'
]);

Route::get('/results',function(){
    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();

        return view('results')->with('posts',$posts)
                              ->with('title','Search results: '.request('query'))
                              ->with('setting',\App\Setting::first())
                              ->with('categories',\App\Category::take(4)->get())
                              ->with('query',request('query'));
}
);

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('/test',function(){
        return App/Category :: find(1)->posts;
    });


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

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as'=> 'users'
    ]);

    Route::get('/users/create',[
        'uses' => 'UsersController@create',
        'as'   => 'users.create'
    ]);

    Route::post('/users/strore',[
        'uses' => 'UsersController@store',
        'as' => 'users.store'
    ]);

    Route::get('/users/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as'   => 'user.admin'
    ]);

    Route::get('/users/not-admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as'   => 'user.not.admin'
    ]);

    Route::get('users/profile',[
        'uses' => 'ProfilesController@index',
        'as'   => 'users.profile'
    ]);

    Route::get('users/delete/{id}',[
        'uses' => 'ProfilesController@destroy',
        'as'   => 'users.delete'
    ]);

    Route::post('users/profile/update',[
        'uses' => 'ProfilesController@update',
        'as'   => 'users.profile.update'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

});


