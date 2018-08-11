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
/*Route::get('/', function () {
    return 'Hello World';
});*/
/*Route::get ('/', function () {
   return view('webhome.pyrupayindex');
});*/

/*Route::get ('/test', function () {
	$str = 'this is testing [b class="test"]test[/b]';
   	$result = \Shortcode::compile($str);
   	return $result;
});*/

Route::get('/test', function(){
	Shortcode::enable();
	$shortcode = App::make('Shortcode');
    return view('test')->withShortcodes();
});

Route::get('/test1', function(){
	Shortcode::enable();
	$shortcode = App::make('Shortcode');
    return view('shortcodes/imgslider')->withShortcodes();
});

Route::get ('/pyrupay', function () {
   return view('webhome.pyrupayindex');
});
   
Route::get('/allposts', 'PostController@index')->name('allposts');
Route::resource('media', 'MediaController')->only('show');
Route::get('/posts/feed', 'PostFeedController@index')->name('posts.feed');
//Route::get('/pyrupay', 'WebhomeController@pindex');



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
Route::get('/thispage/{page}', 'PageController@thispage')->name('page.custompage');
Route::get('/artpage/{page}', 'PageController@artpage')->name('page.custompage1');

Route::resource('posts', 'PostController')->only('show');
Route::resource('users', 'UserController')->only('show');

