<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// catch the missing routes by defining missing method in `app/start/global.php`

// uncomment to see all SQL queries on page
/*Event::listen('illuminate.query', function($sql){
   var_dump($sql);
});*/

Route::controller('access', 'AccessController');

// controller routes added for the ability to make custom methods

Route::resource('posts', 'PostController');
Route::controller('posts', 'PostController');

Route::resource('users', 'UserController');
Route::controller('users', 'UserController');

Route::resource('pages', 'PageController');
Route::controller('pages', 'PageController');

Route::resource('categories', 'CategoryController');
Route::controller('categories', 'CategoryController');

Route::get('/', array('as' => 'home', 'uses' => 'PublicController@index'));

Route::post('contact', array('uses' => 'PublicController@contact'));

Route::get('{permalink?}', 'PublicController@show')
    ->where('permalink', '[\-_A-Za-z].+');

	
// redirections

