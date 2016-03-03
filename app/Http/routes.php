<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentification routes
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',  ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers(['password' => 'Auth\PasswordController']);
    // Password request
    Route::get('auth/remind', ['as' => 'auth.remind', 'middleware' => 'guest', 'uses' => 'Auth\PasswordController@getEmail']);
    Route::post('auth/remind', ['as' => 'auth.remind', 'middleware' => 'guest', 'uses' => 'Auth\PasswordController@postEmail']);


Route::get('/', 'Frontend\PagesController@home');


Route::group(['namespace' => 'Frontend'], function (){
    //home
    Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);

    // resume
    Route::get('/resume', ['as' => 'resume', 'uses' => 'PagesController@resume']);

    // contact
    Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
    Route::post('/contact', ['as' => 'contact', 'uses' => 'PagesController@postContact']);

    // blog
    Route::get('/blog', ['as' => 'blog.index', 'uses' => 'BlogController@index']);
    Route::get('/blog/{slug}', ['as' => 'blog.show', 'uses' => 'BlogController@show']);
    Route::get('/blog/tag/{slug}', ['as' => 'blog.tag', 'uses' => 'BlogController@tag']);

    // work
    Route::get('/works', ['as' => 'works.index', 'uses' => 'WorkController@index']);
    Route::get('/works/{slug}', ['as' => 'works.show', 'uses' => 'WorkController@show']);
    Route::get('/works/tag/{slug}', ['as' => 'work.tag', 'uses' => 'WorkController@tag']);

    //comment
    Route::post('/comment', ['as' => 'comment.store', 'uses' => 'CommentsController@store']);

    //search
    Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@index']);

    //user
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/profile', ['as' => 'user.profile', 'uses' => 'ProfileController@index']);
        Route::get('/user/{name}/blogs', ['as' => 'user.blogs', 'uses' => 'BlogController@myposts']);
        Route::get('/blog/edit/{id}', ['as' => 'blog.edit', 'uses' => 'BlogController@edit']);
        Route::put('/blog/{id}', ['as' => 'blog.update', 'uses' => 'BlogController@update']);

    });

});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['entrust:admin']], function () {
        // Dashboard
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
        Route::get('/home', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

        // Posts
        Route::resource('posts', 'PostsController');
        Route::get('posts/delete/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'PostsController@destroy']);

        // Tags
        Route::resource('tags', 'TagsController');
        Route::get('tags/destroy/{id}', ['as' => 'admin.tags.destroy', 'uses' => 'TagsController@destroy']);

        //Users
        Route::resource('users', 'UsersController');
        Route::get('users/destroy/{id}', ['as' => 'admin.users.destroy', 'uses' => 'UsersController@destroy']);

        // Roles
        Route::resource('roles', 'RolesController');

        // Permissions
        Route::resource('permissions', 'PermissionsController');
    });

});

