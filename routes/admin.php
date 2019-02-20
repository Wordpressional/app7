<?php


Route::get('dashboard', 'ShowDashboard')->name('dashboard');

Route::get('/forms/smanagement',[


'uses' => 'FormbuilderController@smanagement',
'as' => 'forms.smanagement'

]);

Route::get('/forms/sedit',[


'uses' => 'FormbuilderController@sedit',
'as' => 'forms.sedit'

]);

Route::post('/forms/updateshortcode/{id}',[


'uses' => 'FormbuilderController@updateshortcode',
'as' => 'forms.updateshortcode'

]);

Route::get('/forms/snippets',[


'uses' => 'FormbuilderController@snippets',
'as' => 'forms.snippets'

]);

Route::get('/forms/preview/{id}',[


'uses' => 'FormbuilderController@preview',
'as' => 'forms.preview'

]);

Route::get('/forms/previewfull/{id}',[


'uses' => 'FormbuilderController@previewfull',
'as' => 'forms.previewfull'

]);

Route::get('/forms/preview1/{id}',[


'uses' => 'FormbuilderController@preview1',
'as' => 'forms.preview1'

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

Route::get('/forms/gereneratemenu',[


'uses' => 'FormbuilderController@menubuilder',
'as' => 'forms.menubuilder'

]);

Route::get('/static/starterform',[


'uses' => 'StaticController@StarterStaticForm',
'as' => 'static.starterform'

]);

Route::get('/static/downloadstarter',[


'uses' => 'StaticController@downloadStarterStatic',
'as' => 'static.downloadstarter'

]);

Route::post('/static/savestarter',[


'uses' => 'StaticController@SaveStarterStatic',
'as' => 'static.savestarter'

]);
Route::get('/static/savestarter',[


'uses' => 'StaticController@SaveStarterStatic',
'as' => 'static.savestarter'

]);


Route::get('/cforms/preview/{id}',[


'uses' => 'ContactFormbuilderController@preview',
'as' => 'cforms.preview'

]);

Route::get('/themepreview',[


'uses' => 'ThemeController@previewintheme',
'as' => 'themepreview'

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

Route::get('/forms/shortedit/{id}',[


'uses' => 'FormbuilderController@shortedit',
'as' => 'forms.shortedit'

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

Route::post('cmsswitchuser', 'ShowDashboard@cmsSwitchUser')->name('dashboard.cmsswitchuser');
Route::get('/cmsrestoreuser', 'ShowDashboard@cmsRestoreUser')->name('dashboard.cmsrestoreuser');

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

Route::get('/posts/edit/{id}',[

'uses' => 'PostController@edit',
'as' => 'posts.edit'

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

Route::post('/installthemes/',[

'uses' => 'ThemeController@installthemes',
'as' => 'installthemes'

]);

Route::get('/deletetheme/{id}',[


'uses' => 'ThemeController@deletetheme',
'as' => 'deletetheme'

]);
Route::post('/activatetheme/',[

'uses' => 'ThemeController@activatetheme',
'as' => 'activatetheme'

]);

Route::post('/previewtheme/',[

'uses' => 'ThemeController@previewtheme',
'as' => 'previewtheme'

]);

Route::post('/deactivatetheme/',[

'uses' => 'ThemeController@deactivatetheme',
'as' => 'deactivatetheme'

]);

Route::post('/resettheme/',[

'uses' => 'ThemeController@resettheme',
'as' => 'resettheme'

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

Route::get('/profile',[

'uses' => 'UserController@profile',
'as' => 'dashboard.profile'

]);

Route::get('/ec/profile',[

'uses' => 'PollingController@profile',
'as' => 'ec.profile'

]);

Route::get('/authors',[

'uses' => 'UserController@indexa',
'as' => 'authors.index'

]);

Route::get('/authors/edita/{id}',[

'uses' => 'UserController@edita',
'as' => 'authors.edita'

]);
Route::patch('/authors/updatea/{id}',[

'uses' => 'UserController@updatea',
'as' => 'authors.updatea'

]);
Route::get('/authors/createa',[

'uses' => 'UserController@createa',
'as' => 'authors.createa'

]);
Route::post('/authors/storea',[

'uses' => 'UserController@storea',
'as' => 'authors.storea'

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

Route::get('/cmsactivitylogs',[


'uses' => 'ShowDashboard@cmsactivitylogs',
'as' => 'cms.cmsactivitylogs'

]);

Route::get('/cmsdisplayusers',[


'uses' => 'ShowDashboard@cmsdisplayusers',
'as' => 'cms.cmsdisplayusers'

]);



Route::group(['middleware' => ['role_sadmin:elec_superadmin']], function () {
Route::get('/accountsettings',[


'uses' => 'PollingController@accountSettings',
'as' => 'polling.accountsettings'

]);
});

Route::group(['middleware' => ['role_sadmin:elec_bootlevelofficer']], function () {
Route::get('/materialslist',[


'uses' => 'PollingController@materialslist',
'as' => 'polling.materialslist'

]);
});
Route::group(['middleware' => ['role_sadmin:elec_asistantreturningofficer']], function () {
Route::get('/displayerousers',[


'uses' => 'PollingController@displayerousers',
'as' => 'polling.displayerousers'

]);
});

Route::group(['middleware' => ['role_sadmin:elec_ceo']], function () {


Route::get('/listusers',[


'uses' => 'PollingController@listusers',
'as' => 'polling.listusers'

]);

Route::post('/storeromapping',[


'uses' => 'PollingController@storeromapping',
'as' => 'polling.storeromapping'

]);

Route::post('/ajaxprepolldetail1',[


'uses' => 'PollingController@ajax_prepolldetail1',
'as' => 'polling.ajaxprepolldetail1'

]);

Route::get('/showuserroreport',[


'uses' => 'PollingController@showuserroreport',
'as' => 'polling.showuserroreport'

]);

Route::get('/showuserporeport',[


'uses' => 'PollingController@showuserporeport',
'as' => 'polling.showuserporeport'

]);



Route::post('/storeelecaccount',[


'uses' => 'PollingController@storeelecaccount',
'as' => 'polling.storeelecaccount'

]);

Route::get('/activitylogs',[


'uses' => 'PollingController@activitylogs',
'as' => 'polling.activitylogs'

]);

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

Route::get('/createeleusers',[


'uses' => 'PollingController@createeleusers',
'as' => 'polling.createeleusers'

]);

Route::post('/storecsv',[


'uses' => 'PollingController@storecsv',
'as' => 'polling.storecsv'

]);

Route::get('/jsonuser',[


'uses' => 'PollingController@jsonuser',
'as' => 'polling.jsonuser'

]);

Route::get('/displayusers',[


'uses' => 'PollingController@displayusers',
'as' => 'polling.displayusers'

]);




Route::post('/createusersfromceo',[


'uses' => 'PollingController@createusersfromceo',
'as' => 'polling.createusersfromceo'

]);

Route::post('/usersearch',[


'uses' => 'PollingController@userSearch',
'as' => 'polling.usersearch'

]);

Route::post('/blosearch',[


'uses' => 'PollingController@bloSearch',
'as' => 'polling.blosearch'

]);

Route::get('/eleusers/editelec/{id}',[

'uses' => 'UserController@editelec',
'as' => 'eleusers.editelec'

]);
Route::put('/eleusers/updateelec/{id}',[

'uses' => 'UserController@updateelec',
'as' => 'eleusers.updateelec'

]);
Route::get('/eleusers/deleteelec/{id}',[

'uses' => 'UserController@destroyelec',
'as' => 'eleusers.deleteelec'

]);
Route::get('/users/restoreelec/{id}',[

'uses' => 'UserController@restoreelec',
'as' => 'eleusers.restoreelec'

]);
//Route::post('image-view','ImageController@store');

Route::get('/testmongo',[


'uses' => 'PollingController@someMethod',
'as' => 'polling.testmongo'

]);

Route::get('/csvtoarray',[


'uses' => 'UserController@csvToArray',
'as' => 'polling.csvtoarray'

]);

Route::post('/importcsv',[


'uses' => 'UserController@importCsv',
'as' => 'polling.importcsv'

]);

Route::get('/importcsv',[


'uses' => 'UserController@importCsv',
'as' => 'polling.importcsv'

]);

Route::get('/showuserregreport',[


'uses' => 'PollingController@showuserregreport',
'as' => 'polling.showuserregreport'

]);

Route::get('/ajax-select-dist/{id}',[


'uses' => 'PollingController@selectAjaxDist',
'as' => 'polling.ajax-select-dist'

]);

Route::get('/ajax-select-ac/{id}',[


'uses' => 'PollingController@selectAjaxAC',
'as' => 'polling.ajax-select-ac'

]);

Route::get('/ajax-select-part/{id}',[


'uses' => 'PollingController@selectAjaxPart',
'as' => 'polling.ajax-select-part'

]);

Route::get('/ajax-select-blo/{id}',[


'uses' => 'PollingController@selectAjaxBlo',
'as' => 'polling.ajax-select-blo'

]);

Route::get('/ajax-select-blopart/{pid}',[


'uses' => 'PollingController@selectAjaxBloPart',
'as' => 'polling.ajax-select-blopart'

]);

Route::post('eleswitchuser', 'PollingController@eleSwitchUser')->name('user.eleswitch');
Route::get('elerestoreuser', 'PollingController@eleRestoreUser')->name('user.elerestore');


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



Route::get('/static/createmailconfig',[


'uses' => 'StaticController@createmailconfig',
'as' => 'mailconfig.createmailconfig'

]);

Route::post('/static/storemailconfig',[


'uses' => 'StaticController@storemailconfig',
'as' => 'mailconfig.storemailconfig'

]);
Route::get('/static/indexmailconfig',[


'uses' => 'StaticController@indexmailconfig',
'as' => 'mailconfig.indexmailconfig'

]);
Route::get('/static/editmailconfig/{id}',[


'uses' => 'StaticController@editmailconfig',
'as' => 'mailconfig.editmailconfig'

]);
Route::get('/static/deletemailconfig/{id}',[


'uses' => 'StaticController@deletemailconfig',
'as' => 'mailconfig.deletemailconfig'

]);
Route::get('/static/restoremailconfig/{id}',[


'uses' => 'StaticController@restoremailconfig',
'as' => 'mailconfig.restoremailconfig'

]);
Route::post('/static/updatemailconfig/{id}',[


'uses' => 'StaticController@updatemailconfig',
'as' => 'mailconfig.updatemailconfig'

]);