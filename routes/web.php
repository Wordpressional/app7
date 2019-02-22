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
use Illuminate\Support\Facades\Redis;



Route::get('/', 'WebhomeController@frontpage')->name('home');
Route::post('/', 'WebhomeController@frontpage');
Route::get('/testabc', 'WebhomeController@test33');
Route::get('/index123', 'WebhomeController@index123');
Route::get('/welcome1', 'WebhomeController@welcome1')->name('welcome1');

Route::get('/home1', 'WebhomeController@home1')->name('home1');

   
Route::get('/allposts', 'PostController@index')->name('allposts');
Route::resource('media', 'MediaController')->only('show');
Route::get('/posts/feed', 'PostFeedController@index')->name('posts.feed');
Route::get('/pyrupay', 'WebhomeController@pindex');



Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');

Route::get('/postsingle/{post}',[

'uses' => 'PostController@showsingle',
'as' => 'webhome.single'

]);
Route::get('/postsinglemore/{post}',[

'uses' => 'PostController@showsingletwo',
'as' => 'webhome.singlemore'

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
Route::post('/thispage/{page}/', 'PageController@thispage')->name('page.custompage');
Route::get('/thispage/{page}', 'PageController@thispage')->name('page.custompage');


Route::post('/staticpage/{page}/', 'PageController@staticpage')->name('page.staticpage');
Route::get('/staticpage/{page}', 'PageController@staticpage')->name('page.staticpage');

Route::post('/cforms/datacfsave/',[

'uses' => 'PageController@datacfsave',
'as' => 'cforms.p.datacfsave'

]);
Route::post('/cforms/datacfsavemedia/',[

'uses' => 'PageController@datacfsavemedia',
'as' => 'cforms.p.datacfsavemedia'

]);

Route::get('/artpage/{page}', 'PageController@artpage')->name('page.custompage1');

Route::resource('posts', 'PostController')->only('show');
Route::resource('users', 'UserController')->only('show');

Route::get('/logout', 'LogoutController@logout');
Route::get('/download', 'WebhomeController@download');

Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('laravel-filemanager');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

//Route::get('/createconfig', 'InitialController@createconfig')->name('createconfig');
/*Route::post('/generateconfig/',[

'uses' => 'InitialController@generateconfig',
'as' => 'config.generateconfig'

]);
Route::get('/createdatabase', 'InitialController@createdatabase')->name('createdatabase');
Route::post('/generatedatabase/',[

'uses' => 'InitialController@generatedatabase',
'as' => 'config.generatedatabase'

]);*/

// Administrator & SuperAdministrator Control Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => ['role:cms_administrator|administrator|superadministrator'], 'namespace' => 'Admin'], function () {
    Route::resource('users', 'UserController');
    Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RolesController');
});
Route::get('/test', 'WebhomeController@test')->name('test');
Route::get('/broadcast-test', 'WebhomeController@broadcasttest')->name('test');
   

Route::get('/redistest', function () {
    $visits = Redis::incr('visits');
    return $visits;
});

Route::get('a',function(){
    $user = Auth::loginUsingId(2, true);
    return $user;
});


Route::get('/sendmail', 'WebhomeController@sendMailfromNodemailer')->name('mail.sendmail');

Route::post('/updatemailconfig', 'WebhomeController@updatemailconfig')->name('mail.updatemailconfig');