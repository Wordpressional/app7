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

Route::post('/stables/fsave',[


'uses' => 'StablesController@fsave',
'as' => 'stables.fsave'

]);

Route::get('/stables/restore/{id}',[

'uses' => 'StablesController@restore',
'as' => 'stables.restore'

]);

Route::get('/stables/delete/{id}',[

'uses' => 'StablesController@destroy',
'as' => 'stables.delete'

]);

Route::get('/stables/edit/{id}',[


'uses' => 'StablesController@edit',
'as' => 'stables.edit'

]);

Route::resource('cforms', 'ContactFormbuilderController');

Route::resource('stables', 'StablesController');

Route::resource('forms', 'FormbuilderController');
Route::resource('posts', 'PostController');
Route::resource('pages', 'PageController');
Route::delete('/posts/{post}/thumbnail', 'PostThumbnailController@destroy')->name('posts_thumbnail.destroy');
Route::resource('users', 'UserController');
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
Route::post('/forms/updatepre/{id}',[


'uses' => 'FormbuilderController@updatepre',
'as' => 'forms.updatepre'

]);
Route::post('/cforms/update/{id}',[


'uses' => 'ContactFormbuilderController@update',
'as' => 'cforms.update'

]);

Route::post('/stables/update/{id}',[


'uses' => 'StablesController@update',
'as' => 'stables.update'

]);

Route::post('/stables/updatetablename/{id}',[


'uses' => 'StablesController@updatetablename',
'as' => 'stables.updatetablename'

]);


Route::post('/cforms/createshortcode/{id}',[


'uses' => 'ContactFormbuilderController@createshortcode',
'as' => 'cforms.createshortcode'

]);

Route::post('/cforms/operate/{id}',[


'uses' => 'ContactFormbuilderController@operate',
'as' => 'cforms.operate'

]);
Route::post('/cforms/datacfsave/{id}',[


'uses' => 'ContactFormbuilderController@datacfsave',
'as' => 'cforms.datacfsave'

]);

Route::post('/cforms/ucolcount/{id}',[


'uses' => 'ContactFormbuilderController@ucolcount',
'as' => 'cforms.ucolcount'

]);



Route::post('/cforms/remcolftable/{id}',[


'uses' => 'ContactFormbuilderController@remcolftable',
'as' => 'cforms.remcolftable'

]);

Route::post('/cforms/addcoltotable/{id}',[


'uses' => 'ContactFormbuilderController@addcoltotable',
'as' => 'cforms.addcoltotable'

]);

Route::post('/cforms/remcolftable/{id}',[


'uses' => 'ContactFormbuilderController@remcolftable',
'as' => 'cforms.remcolftable'

]);

Route::post('/cforms/datacfsave/',[

'uses' => 'ContactFormbuilderController@datacfsave',
'as' => 'cforms.datacfsave'

]);

Route::get('/styles',[


'uses' => 'StyleController@style',
'as' => 'styles'

]);

Route::post('/storecolors/',[

'uses' => 'StyleController@storecolors',
'as' => 'storecolors'

]);

Route::get('/branding',[


'uses' => 'BrandingController@branding',
'as' => 'branding'

]);

Route::post('/storebranding/',[

'uses' => 'BrandingController@storebranding',
'as' => 'storebranding'

]);

Route::get('/themes',[


'uses' => 'ThemeController@themes',
'as' => 'themes'

]);

Route::post('/loadthemes/',[

'uses' => 'ThemeController@loadthemes',
'as' => 'loadthemes'

]);
Route::post('/activatetheme/',[

'uses' => 'ThemeController@activatetheme',
'as' => 'activatetheme'

]);

Route::post('/deactivatetheme/',[

'uses' => 'ThemeController@deactivatetheme',
'as' => 'deactivatetheme'

]);

Route::get('/widgeteditor',[


'uses' => 'ThemeController@widgeteditor',
'as' => 'widgeteditor'

]);

Route::post('/widgetupw',[

'uses' => 'ThemeController@updatew',
'as' => 'widgetupdate'

]);

Route::get('/csseditor',[


'uses' => 'ThemeController@csseditor',
'as' => 'csseditor'

]);

Route::post('/cssupdate',[

'uses' => 'ThemeController@updatecss',
'as' => 'cssupdate'

]);

Route::get('/widgetcusteditor',[


'uses' => 'ThemeController@widgetcusteditor',
'as' => 'widgetcusteditor'

]);

Route::post('/widgetupcustw',[

'uses' => 'ThemeController@updatewcust',
'as' => 'widgetcustupdate'

]);

Route::get('/jseditor',[


'uses' => 'ThemeController@jseditor',
'as' => 'jseditor'

]);

Route::post('/jsupdate',[

'uses' => 'ThemeController@updatejs',
'as' => 'jsupdate'

]);

Route::get('/authors',[

'uses' => 'UserController@indexa',
'as' => 'authors.index'

]);

Route::get('/authors/edita/{id}',[

'uses' => 'UserController@edita',
'as' => 'authors.edit'

]);
Route::post('/authors/updatea/{id}',[

'uses' => 'UserController@updatea',
'as' => 'authors.update'

]);


Route::get('/users',[

'uses' => 'UserController@index',
'as' => 'users'

]);
Route::get('/users/create',[

'uses' => 'UserController@create',
'as' => 'users.create'

]);
Route::post('/users/store',[

'uses' => 'UserController@store',
'as' => 'users.store'

]);
Route::get('/users/edit/{id}',[

'uses' => 'UserController@edit',
'as' => 'users.edit'

]);
Route::put('/users/update/{id}',[

'uses' => 'UserController@update',
'as' => 'users.update'

]);
Route::get('/users/delete/{id}',[

'uses' => 'UserController@destroy',
'as' => 'users.delete'

]);
Route::get('/users/restore/{id}',[

'uses' => 'UserController@restore',
'as' => 'users.restore'

]);

Route::get('/modules',[


'uses' => 'ModuleController@loadmodules',
'as' => 'modules'

]);

Route::get('/activate/{id}',[


'uses' => 'ModuleController@activate',
'as' => 'module.activate'

]);

Route::get('/deactivate/{id}',[


'uses' => 'ModuleController@deactivate',
'as' => 'module.deactivate'

]);

Route::get('/install/{id}',[


'uses' => 'ModuleController@install',
'as' => 'module.install'

]);

Route::get('/uninstall/{id}',[


'uses' => 'ModuleController@uninstall',
'as' => 'module.uninstall'

]);


Route::get('/dumpmodules',[


'uses' => 'ModuleController@dumpmodules',
'as' => 'module.dumpmodules'

]);
Route::group(['middleware' => ['role_sadmin:elec_ceo']], function () {
Route::get('/showpollingform',[


'uses' => 'PollingController@showpollingform',
'as' => 'polling.showpollingform'

]);
Route::get('/showpollingdataperhr',[


'uses' => 'PollingController@showpollingdataperhr',
'as' => 'polling.showpollingdataperhr'

]);
Route::get('/showpollingexceptiondata',[


'uses' => 'PollingController@showpollingexceptiondata',
'as' => 'polling.showpollingexceptiondata'

]);
Route::get('/showpollingvoterdata',[


'uses' => 'PollingController@showpollingvoterdata',
'as' => 'polling.showpollingvoterdata'

]);
Route::get('/showpollingstarted',[


'uses' => 'PollingController@showpollingstarted',
'as' => 'polling.showpollingstarted'

]);
});

Route::resource('task', 'TaskController');
Route::get('/task/create',[


'uses' => 'TaskController@create',
'as' => 'task.create'

]);
Route::get('/task/index',[


'uses' => 'TaskController@index',
'as' => 'task.index'

]);
Route::post('/task/store',[


'uses' => 'TaskController@store',
'as' => 'task.store'

]);

Route::get('/task/edit/{id}',[


'uses' => 'TaskController@edit',
'as' => 'task.edit'

]);
Route::get('/task/destroy/{id}',[


'uses' => 'TaskController@destroy',
'as' => 'task.destroy'

]);

Route::patch('/task/update/{id}',[


'uses' => 'TaskController@update',
'as' => 'task.update'

]);


Route::post('image-view','ImageController@store');