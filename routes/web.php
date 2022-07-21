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

// Route::get('/', function () {
    // return view('welcome');
    // Route::post('menu/tambah/', 'menu_Controller@tambah_menu')->name('tambah.menu');
// });
    // Route::get('/','LoginController@show_login_form')->name('login');
    

    Route::group(['middleware'=>'auth:usr,admin'], function() {
    //Now this routes can be accessible by both admin as well as 


    // Route::get('/', 'PostController@index')->name('index')->middleware('auth');
    // Route::get('/', 'PostController@index')->name('index')->middleware('auth');



    Route::get('admin/adminuser/dashboard','adminuserController@dashboard')->name('adminuser_dashboard')->middleware('auth');
    
    Route::get('admin/adminuser','adminuserController@index')->name('adminuser_view')->middleware('auth');


    Route::get('admin/adminuser/disable','adminuserController@disable_user')->name('disable_user')->middleware('auth');
    Route::post('admin/adminuser/disable','adminuserController@disable_user')->name('disable_user')->middleware('auth');


    Route::get('admin/adminuser/enable','adminuserController@enable_user')->name('enable_user')->middleware('auth');
    Route::post('admin/adminuser/enable','adminuserController@enable_user')->name('enable_user')->middleware('auth');


    Route::get('marketing/customer/tambah_data', 'MarketingController@create')->name('create')->middleware('auth');

    Route::post('marketing/customer/simpan_data', 'MarketingController@store')->name('customer_store');

    // Route::get('/home', 'MarketingController@show_login_form')->name('login');
    // Route::post('/home', 'PostController@index')->name('index')->middleware('auth');

    Route::get('/marketing', 'MarketingController@index')->name('index')->middleware('auth');
    Route::post('/marketing', 'MarketingController@index')->name('index')->middleware('auth');

    Route::get('/marketing/customer', 'MarketingController@customer')->name('customer')->middleware('auth');
    Route::post('/marketing/customer', 'MarketingController@customer')->name('customer')->middleware('auth');

    Route::get('/marketing/customer_progress', 'MarketingController@customer_progress')->name('customer_progress')->middleware('auth');
    Route::post('/marketing/customer_progress', 'MarketingController@customer_progress')->name('customer_progress')->middleware('auth');

    Route::get('/marketing/customer_visit', 'MarketingController@customer_visit')->name('customer_visit')->middleware('auth');
    Route::post('/marketing/customer_visit', 'MarketingController@customer_visit')->name('customer_visit')->middleware('auth');
    Route::post('/marketing/customer_visit/get_customer', 'MarketingController@get_customer')->name('customer_id')->middleware('auth');

    Route::get('/marketing/customer_visit/simpan', 'MarketingController@customer_visit_store')->name('customer_visit_store')->middleware('auth');
    Route::post('/marketing/customer_visit/simpan', 'MarketingController@customer_visit_store')->name('customer_visit_store')->middleware('auth');




    Route::get('/marketing/project', 'MarketingController@project')->name('customer_project')->middleware('auth');
    Route::post('/marketing/project', 'MarketingController@project')->name('customer_project')->middleware('auth');
    
    Route::get('/finance', 'financeController@index')->name('index')->middleware('auth');
    Route::post('/finance', 'financeController@index')->name('index')->middleware('auth');
    
    Route::get('/warehouse', 'warehouseController@index')->name('index')->middleware('auth');
    Route::post('/warehouse', 'warehouseController@index')->name('index')->middleware('auth');
    
    });        
    // Auth route

    
    Route::namespace('Auth')->group(function () {
   
     // Route::get('/home', 'LoginController@show_login_form')->name('Home');
      
      Route::get('/','LoginController@show_login_form')->name('login');

        
      Route::get('/login','LoginController@show_login_form')->name('login');
      Route::post('/login','LoginController@process_login')->name('login');

      // Route::get('/admin/login_admin','LoginController@login_admin')->name('login_admin');
      // Route::post('/admin/login_admin','LoginController@login_admin')->name('login_admin');

      Route::get('/login/verified','LoginController@process_login')->name('verified');
      Route::post('/login/verified','LoginController@process_login')->name('verified');

      Route::get('/register','LoginController@show_signup_form')->name('register');
      Route::post('/register','LoginController@process_signup');

      Route::get('/logout','LoginController@logout')->name('logout');
      Route::post('/logout','LoginController@logout')->name('logout');

      Route::get('login/changepass','ResetPasswordController@view')->name('changepasspage')->middleware('auth');
      Route::post('login/changepass','ResetPasswordController@changepass')->name('changepass')->middleware('auth');



     

    });    


