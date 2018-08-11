<?php

Route::get('dashboard', 'ShowDashboard')->name('dashboard');

Route::get('/forms/snippets',[


'uses' => 'FormbuilderController@snippets',
'as' => 'forms.snippets'

]);

Route::get('/forms/preview/{id}',[


'uses' => 'FormbuilderController@preview',
'as' => 'forms.preview'

]);

Route::post('/forms/fsave',[


'uses' => 'FormbuilderController@fsave',
'as' => 'forms.fsave'

]);

Route::get('/forms/restore/{id}',[

'uses' => 'FormbuilderController@restore',
'as' => 'forms.restore'

]);

Route::get('/forms/delete/{id}',[

'uses' => 'FormbuilderController@destroy',
'as' => 'forms.delete'

]);

Route::get('/forms/edit/{id}',[


'uses' => 'FormbuilderController@edit',
'as' => 'forms.edit'

]);


Route::get('/cforms/ppreview',[


'uses' => 'ContactFormbuilderController@ppreview',
'as' => 'cforms.ppreview'

]);

Route::get('/cforms/preview/{id}',[


'uses' => 'ContactFormbuilderController@preview',
'as' => 'cforms.preview'

]);

Route::post('/cforms/fsave',[


'uses' => 'ContactFormbuilderController@fsave',
'as' => 'cforms.fsave'

]);

Route::get('/cforms/restore/{id}',[

'uses' => 'ContactFormbuilderController@restore',
'as' => 'cforms.restore'

]);

Route::get('/cforms/delete/{id}',[

'uses' => 'ContactFormbuilderController@destroy',
'as' => 'cforms.delete'

]);

Route::get('/cforms/edit/{id}',[


'uses' => 'ContactFormbuilderController@edit',
'as' => 'cforms.edit'

]);

Route::resource('cforms', 'ContactFormbuilderController');

Route::resource('forms', 'FormbuilderController');
Route::resource('posts', 'PostController');
Route::resource('pages', 'PageController');
Route::delete('/posts/{post}/thumbnail', 'PostThumbnailController@destroy')->name('posts_thumbnail.destroy');
Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);
Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
Route::get('/posts/new/create', 'PostController@create')->name('posts.new.create');
Route::get('/category/create',[


'uses' => 'CategoryController@create',
'as' => 'category.create'

]);

Route::post('/category/store',[


'uses' => 'CategoryController@store',
'as' => 'category.store'

]);
Route::get('/categories',[


'uses' => 'CategoryController@index',
'as' => 'categories'

]);
Route::get('/category/edit/{id}',[


'uses' => 'CategoryController@edit',
'as' => 'category.edit'

]);
Route::get('/category/delete/{id}',[


'uses' => 'CategoryController@destroy',
'as' => 'category.delete'

]);
Route::get('/category/restore/{id}',[


'uses' => 'CategoryController@restore',
'as' => 'category.restore'

]);
Route::post('/category/update/{id}',[


'uses' => 'CategoryController@update',
'as' => 'category.update'

]);

Route::get('/tags',[

'uses' => 'TagsController@index',
'as' => 'tags'

]);
Route::get('/tags/create',[

'uses' => 'TagsController@create',
'as' => 'tags.create'

]);
Route::post('/tags/store',[

'uses' => 'TagsController@store',
'as' => 'tags.store'

]);
Route::get('/tags/edit/{id}',[

'uses' => 'TagsController@edit',
'as' => 'tags.edit'

]);
Route::post('/tags/update/{id}',[

'uses' => 'TagsController@update',
'as' => 'tags.update'

]);
Route::get('/tags/delete/{id}',[

'uses' => 'TagsController@destroy',
'as' => 'tags.delete'

]);
Route::get('/tags/restore/{id}',[

'uses' => 'TagsController@restore',
'as' => 'tags.restore'

]);

Route::get('/pages/restore/{id}',[

'uses' => 'PageController@restore',
'as' => 'pages.restore'

]);

Route::get('/pages/delete/{id}',[

'uses' => 'PageController@destroy',
'as' => 'pages.delete'

]);

Route::get('/posts/restore/{id}',[

'uses' => 'PostController@restore',
'as' => 'posts.restore'

]);

Route::get('/posts/delete/{id}',[

'uses' => 'PostController@destroy',
'as' => 'posts.delete'

]);

Route::post('/forms/update/{id}',[


'uses' => 'FormbuilderController@update',
'as' => 'forms.update'

]);
Route::post('/cforms/update/{id}',[


'uses' => 'ContactFormbuilderController@update',
'as' => 'cforms.update'

]);




