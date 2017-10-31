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
    return view('auth.login');
});


 Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy',[
        'uses'=>'UsersController@destroy',
        'as'=> 'admin.users.destroy'
        ]);

    Route::resource('categories','CategoriesController');
    Route::get('categories/{id}/destroy',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'admin.categories.destroy'
    ]);

     Route::resource('tags','TagsController');
     Route::get('tags/{id}/destroy',[
         'uses'=>'TagsController@destroy',
         'as'=>'admin.tags.destroy'
     ]);

     Route::resource('articles','ArticlesController');
     Route::get('articles/{id}/destroy',[
         'uses'=>'ArticlesController@destroy',
         'as'=>'admin.articles.destroy'
     ]);

     Route::get('images',[
         'uses'=>'ImagesController@index',
         'as'=>'admin.images.index'
     ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
