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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'WebhomeController@frontpage')->name('home');
Route::post('/', 'WebhomeController@frontpage')->name('home');
//Route::get('/testabc', 'WebhomeController@test33');
//Route::get('/index123', 'WebhomeController@index123');
//Route::get('/welcome1', 'WebhomeController@welcome1')->name('welcome1');

//Route::get('/home1', 'WebhomeController@home1')->name('home1');

   
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

Route::post('/landingsitepage/{page}/', 'PageController@landingsitepage')->name('page.landingsitepage');
Route::get('/landingsitepage/{page}', 'PageController@landingsitepage')->name('page.landingsitepage');

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
Route::group(['prefix' => 'cadmin', 'middleware' => 'auth', 'middleware' => ['role:cms_administrator|administrator|superadministrator'], 'namespace' => 'CAdmin'], function () {
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

Route::post('/uploadimgfromfe', 'WebhomeController@uploadimgfromfe')->name('uploadimgfromfe');



Route::get('/subscribersignup', 'WebhomeController@subscribersignup')->name('subscribersignup');

Route::post('/registration',[


'uses' => 'WebhomeController@store_registration',
'as' => 'signup.registration'

]);

Route::namespace('CAdmin')->group(function () {
Route::get('demo/dashboard', 'ShowDashboard@demoindex')->name('demo.dashboard');

});

/**
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
     Route::get('admin/emplogin', 'EmpLoginController@showLoginForm')->name('admin.emplogin');
    Route::post('admin/emplogin', 'EmpLoginController@login')->name('admin.emplogin');
    Route::get('admin/logout', 'EmpLoginController@logout')->name('admin.logout');
});
Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.' ], function () {
    Route::namespace('Admin')->group(function () {
        //Route::group(['middleware' => ['role:admin|superadmin|clerk, guard:employee']], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::namespace('Products')->group(function () {
                Route::resource('products', 'ProductController');
                Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
                Route::get('remove-image-thumb', 'ProductController@removeThumbnail')->name('product.remove.thumb');
            });
            Route::namespace('Customers')->group(function () {
                Route::resource('customers', 'CustomerController');
                Route::resource('customers.addresses', 'CustomerAddressController');
            });
            Route::namespace('Categories')->group(function () {
                Route::resource('categories', 'CategoryController');
                Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
            });
            Route::namespace('Orders')->group(function () {
                Route::resource('orders', 'OrderController');
                Route::resource('order-statuses', 'OrderStatusController');
                Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
            });
            Route::resource('addresses', 'Addresses\AddressController');
            Route::resource('countries', 'Countries\CountryController');
            Route::resource('countries.provinces', 'Provinces\ProvinceController');
            Route::resource('countries.provinces.cities', 'Cities\CityController');
            Route::resource('couriers', 'Couriers\CourierController');
            Route::resource('attributes', 'Attributes\AttributeController');
            Route::resource('attributes.values', 'Attributes\AttributeValueController');
            Route::resource('brands', 'Brands\BrandController');

        
        //Route::group(['middleware' => ['role:admin|superadmin, guard:employee']], function () {
            Route::resource('employees', 'EmployeeController');
            Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::resource('roles', 'Roles\RoleController');
            Route::resource('permissions', 'Permissions\PermissionController');
            });
        //});
    //});
});

/**
 * Frontend routes
 */
Auth::routes();
Route::namespace('Auth')->group(function () {
    Route::get('cart/custlogin', 'CartLoginController@showLoginForm')->name('cart.custlogin');
    Route::post('cart/custlogin', 'CartLoginController@login')->name('cart.custlogin');
    Route::get('logout', 'CartLoginController@logout');
    Route::get('cart/custreg', 'CartRegisterController@cartregister')->name('cart.custreg');
Route::post('cart/register', 'CartRegisterController@register')->name('cart.register');


    Route::get('cart/custe1login', 'Carte1LoginController@showLogine1Form')->name('cart.custe1login');
    Route::post('cart/custe1login', 'Carte1LoginController@login')->name('cart.custe1login');
    Route::get('logout', 'CartLoginController@logout');
    Route::get('cart/custe1reg', 'CartRegisterController@cartregistere1form')->name('cart.custe1reg');
   Route::post('cart/registere1', 'CartRegisterController@registere1')->name('cart.registere1');


    
    Route::get('demologin', 'DemoPortalLoginController@showLoginForm')->name('demologin');
    Route::post('demologin', 'DemoPortalLoginController@demologin')->name('demologinp');


});




Route::namespace('Front')->group(function () {

Route::get('demologine1', 'HomeController@demologine1')->name('demologine1');
//Route::get('/123', 'WebhomeFrontController@frontpage')->name('home');
//Route::post('/123', 'WebhomeFrontController@frontpage')->name('home');
    //Route::get('/', 'HomeController@index')->name('home');
Route::get('ecomm1', 'HomeController@ecomm1')->name('ecomm1');
Route::get('index1', 'HomeController@index1')->name('index1');
Route::get('index2', 'HomeController@index2')->name('index2');
Route::get('index3', 'HomeController@index3')->name('index3');
Route::get('index4', 'HomeController@index4')->name('index4');
Route::get('shopthemes', 'HomeController@shopthemes')->name('shopthemes');

Route::get('subscribenow', 'HomeController@subscribenow')->name('subscribenow');
Route::get('theme_megamenu', 'HomeController@theme_megamenu')->name('theme_megamenu');
Route::get('customere1login', 'HomeController@customere1login')->name('customere1login');

    Route::group(['middleware' => ['checkout']], function () {

        Route::namespace('Payments')->group(function () {
            Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
            Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
            Route::get('bank-transfer-e1', 'BankTransferController@indexe1')->name('bank-transfere1.index');
            Route::post('bank-transfer-e1', 'BankTransferController@storee1')->name('bank-transfere1.store');
        });

        Route::namespace('Addresses')->group(function () {
            Route::resource('country.state', 'CountryStateController');
            Route::resource('state.city', 'StateCityController');
        });

        Route::get('accounts', 'AccountsController@index')->name('accounts');
        Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
        Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
        Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
        Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
        Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
        Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
        Route::resource('customer.address', 'CustomerAddressController');
    });


    Route::group(['middleware' => ['checkout']], function () {

        Route::namespace('Payments')->group(function () {
            Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
            Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
        });

        // Route::namespace('Addresses')->group(function () {
        //     Route::resource('country.state', 'CountryStateController');
        //     Route::resource('state.city', 'StateCityController');
        // });

        Route::get('accountse1', 'AccountsController@indexe1')->name('accountse1');
        Route::get('checkoute1', 'CheckoutController@indexe1')->name('checkoute1.index');
        Route::post('checkoute1', 'CheckoutController@store')->name('checkoute1.store');
        Route::get('checkoute1/execute', 'CheckoutController@executePayPalPayment')->name('checkoute1.execute');
        Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
        Route::get('checkoute1/cancel', 'CheckoutController@cancele1')->name('checkoute1.cancel');
        Route::get('checkoute1/success', 'CheckoutController@successe1')->name('checkoute1.success');
        //Route::resource('customere1.address', 'CustomerAddressController');
        Route::get('customere1/{customer}/address', 'CustomerAddressController@e1index')->name('customere1.address.index');

        Route::get('customere1/{customer}/address/create', 'CustomerAddressController@e1create')->name('customere1.address.create');

        Route::post('customere1/{customer}/address',[

        'uses' => 'CustomerAddressController@e1store',
        'as' => 'customere1.address.store'

        ]);

        Route::get('customere1/{customer}/address/{address}/edit', 'CustomerAddressController@e1edit')->name('customere1.address.edit');

        Route::put('customere1/{customer}/address/{address}',[


        'uses' => 'CustomerAddressController@e1update',
        'as' => 'customere1.address.update'

        ]);

        Route::delete('customere1/{customer}/address/{address}',[


        'uses' => 'CustomerAddressController@e1destroy',
        'as' => 'customere1.address.destroy'

        ]);

        

    });



    Route::resource('cart', 'CartController');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
     Route::get("ecommcategory/{slug}", 'CategoryController@getEcommCategory')->name('front.ecommcategory.slug');
    Route::get("search", 'ProductController@search')->name('search.product');
    Route::get("{product}", 'ProductController@show')->name('front.get.product');

    Route::get("/theme/{product}", 'ProductController@themeshow')->name('front.get.themeproduct');

    Route::get("/mychoosen/{package}", 'ProductController@packageshow')->name('front.get.themepackage');

    Route::get("/my/cart1", 'CartController@cart1')->name('cart.cart1');

    Route::get("/my/cartp1", 'CartController@cartp1')->name('cart.cartp1');

    Route::post("/my/cart1update", 'CartController@cart1update')->name('cart.cart1update');

    Route::post("/my/cart1destroy", 'CartController@cart1destroy')->name('cart.cart1destroy');

    Route::put('/my/cart1update/{cart}',[


    'uses' => 'CartController@cart1update',
    'as' => 'cart.cart1update'

    ]);

    Route::delete('/my/cart1destroy/{cart}',[


    'uses' => 'CartController@cart1destroy',
    'as' => 'cart.cart1destroy'

    ]);

    Route::post('/my/cart1/store1',[

    'uses' => 'CartController@cart1store',
    'as' => 'cart.cart1store'

    ]);

    Route::post('/my/cart1/storep1',[

    'uses' => 'CartController@cartp1store',
    'as' => 'cart.cartp1store'

    ]);

});


Route::post('previewcarttheme',[


'uses' => 'WebhomeController@previewcarttheme',
'as' => 'previewcartthemep'

]);

Route::get("previewcarttheme/{name}", 'WebhomeController@previewcarttheme')->name('previewcarttheme');

Route::get("preview1cart/{name}", 'WebhomeController@preview1cart')->name('preview1cart');

Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/email',[

    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
    'as' => 'password.email'

    ]);
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset',[

    'uses' => 'Auth\ResetPasswordController@resetPassword',
    'as' => 'password.resetd'

    ]);

//cart
Route::get('cart_password/email', 'Auth\CartForgotPasswordController@showcartLinkRequestForm')->name('cart.password.request');

Route::post('cart_password/email',[

    'uses' => 'Auth\CartForgotPasswordController@sendResetLinkEmail',
    'as' => 'cart.password.email'

    ]);




Route::get('cart_password/reset/{token}', 'Auth\CartResetPasswordController@showcartResetForm')->name('cart.password.reset');


Route::post('cart_password/reset',[

    'uses' => 'Auth\CartResetPasswordController@reset',
    'as' => 'cart.password.resetd'

    ]);

//============================================//
Route::get('cart_e1password/email', 'Auth\CartForgotPasswordController@showcartLinkRequeste1Form')->name('cart.e1password.request');

Route::post('cart_e1password/email',[

    'uses' => 'Auth\CartForgotPasswordController@sendResetLinkEmaile1',
    'as' => 'cart.e1password.email'

    ]);




Route::get('cart_e1password/reset/{token}', 'Auth\CartResetPasswordController@showcartResete1Form')->name('cart.e1password.reset');


Route::post('cart_e1password/reset',[

    'uses' => 'Auth\CartResetPasswordController@resetPassword',
    'as' => 'cart.e1password.resetde1'

    ]);

//emp
Route::get('emp_password/email', 'Auth\EmpForgotPasswordController@showempLinkRequestForm')->name('emp.password.request');

Route::post('emp_password/email',[

    'uses' => 'Auth\EmpForgotPasswordController@sendResetLinkEmail2',
    'as' => 'emp.password.email'

    ]);




Route::get('emp_password/reset/{token}', 'Auth\EmpResetPasswordController@showempResetForm')->name('emp.password.reset');


Route::post('emp_password/reset',[

    'uses' => 'Auth\EmpResetPasswordController@resetPassword',
    'as' => 'emp.password.resetd'

    ]);

//demo
Route::get('demo_password/email', 'Auth\DemoForgotPasswordController@showdemoLinkRequestForm')->name('demo.password.request');

Route::post('demo_password/email',[

    'uses' => 'Auth\DemoForgotPasswordController@sendResetLinkEmail1',
    'as' => 'demo.password.email'

    ]
     
    

);




Route::get('demo_password/reset/{token}', 'Auth\DemoResetPasswordController@showdemoResetForm')->name('demo.password.reset');


Route::post('demo_password/reset',[

    'uses' => 'Auth\DemoResetPasswordController@resetPassword',
    'as' => 'demo.password.resetd'

    ]);

Route::post('newsletter-subscriptions-fe',[

    'uses' => 'NewsletterSubscriptionController@store',
    'as' => 'nfestore'

    ]);

Route::post('newsletter-subscriptions-fecheck',[

    'uses' => 'NewsletterSubscriptionController@check',
    'as' => 'nfecheck'

    ]);

Route::get('/demo/showprofile', 'WebhomeController@showprofile')->name('showprofile');

Route::post('/demo/createprofile',[

    'uses' => 'WebhomeController@createprofile',
    'as' => 'createprofile'

    ]);

Route::get('/admin/address/list/index', 'Admin\Addresses\AddressController@index')->name('admin.addresses.index');

Route::get("/load/themetodemo", 'WebhomeController@loadthemetodemo')->name('loadthemetodemo');