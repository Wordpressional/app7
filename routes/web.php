<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




Route::get('/', 'WebhomeController@frontpage')->name('home');
Route::get('/testabc', 'WebhomeController@test33');


   
Route::get('/allposts', 'PostController@index')->name('allposts');
Route::resource('media', 'MediaController')->only('show');
Route::get('/posts/feed', 'PostFeedController@index')->name('posts.feed');
Route::get('/pyrupay', 'WebhomeController@pindex');



Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');

Route::get('/postsingle/{post}',[

'uses' => 'PostController@showsingle',
'as' => 'webhome.single'

]);


Route::get('/postbsingle/{post}',[

'uses' => 'PostController@showbsingle',
'as' => 'webhome.bsingle'

]);

Route::get('/all/cats', 'PostController@allcat')->name('posts.allcat');
Route::get('/all/articles', 'PostController@articles')->name('posts.articles');
Route::get('/all/links', 'PostController@links')->name('posts.links');
Route::get('/cattype/{category}', ['uses' => 'PostController@cattype', 'as' => 'webhome.cattype']);
Route::get('/tagtype/{tag}', ['uses' => 'PostController@tagtype', 'as' => 'webhome.tagtype']);
Route::get('/tagtypeconf/{tag}', ['uses' => 'PostController@tagtypeconf', 'as' => 'webhome.tagtypeconf']);
Route::get('/arttype/{category}', ['uses' => 'PostController@arttype', 'as' => 'webhome.arttype']);
Route::get('/linktype/{category}', ['uses' => 'PostController@linktype', 'as' => 'webhome.linktype']);

Route::resource('pages', 'PageController')->only('show');
//Route::post('/thispage/{page}/', 'PageController@thispage')->name('page.custompage');
Route::get('/thispage/{page}', 'PageController@thispage')->name('page.custompage');

Route::post('/cforms/datacfsave/',[

'uses' => 'PageController@datacfsave',
'as' => 'cforms.datacfsave'

]);
Route::post('/cforms/datacfsavemedia/',[

'uses' => 'PageController@datacfsavemedia',
'as' => 'cforms.datacfsavemedia'

]);

Route::get('/artpage/{page}', 'PageController@artpage')->name('page.custompage1');

Route::resource('posts', 'PostController')->only('show');
Route::resource('users', 'UserController')->only('show');

Route::get('/logout', 'LogoutController@logout');
Route::get('/download', 'WebhomeController@download');

Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('laravel-filemanager');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

Route::get('/createconfig', 'InitialController@createconfig')->name('createconfig');
Route::post('/generateconfig/',[

'uses' => 'InitialController@generateconfig',
'as' => 'config.generateconfig'

]);
Route::get('/createdatabase', 'InitialController@createdatabase')->name('createdatabase');
Route::post('/generatedatabase/',[

'uses' => 'InitialController@generatedatabase',
'as' => 'config.generatedatabase'

]);