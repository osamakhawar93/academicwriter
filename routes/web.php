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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/authentication', function () {
//    dd('here');
//});
Route::get('/dashboard2', function () {
    return view('frontend.userdashboard1');
});
Route::group([
    'middleware' => 'redirectAdminLoggedIn'
        ], function() {
    Route::get('admin/login', 'Backend\MainController@index');
});
Route::get('admin/login', 'Backend\MainController@index');
Route::get('backend/login', 'Backend\MainController@index');
Route::post('backend/authantication','Backend\MainController@authantication');
Route::get('admin/logout', 'Backend\MainController@logout');



Route::post('authentication', 'UserController@authentication');
Route::get('/check_user/status', 'UserController@ajaxuser');
Route::get('verifcation_link/{id}', 'UserController@verfication');
Route::post('/registration', 'HomeController@saveuser')->name('register');
Route::get('/confirmation', 'HomeController@content');

Route::get('/logout', 'MainController@logout');

Route::get('/', 'MainController@home');
Route::get('/home', 'MainController@home')->name('home');
Route::get('/contact', 'MainController@contact')->name('contact');
Route::get('/writers', 'MainController@writers')->name('writers');
Route::get('/samples', 'MainController@samples')->name('samples');
Route::get('/pricing', 'MainController@pricing')->name('pricing');
Route::get('/order', 'MainController@order')->name('order');
Route::get('/faq', 'MainController@faq')->name('faq');
Route::get('/whyus', 'MainController@whyus')->name('whyus');



Route::group(['middleware' => 'user'], function() {
        Route::get('user_portal/dashboard','UserController@index');
        Route::get('user_portal/dashboard','UserController@index')->name('order-history');
        Route::get('user_portal/order_inprogress','UserController@inprogressOrder')->name('order-inprogress');
        Route::get('user_portal/order_revision','UserController@revisionOrder')->name('order-revision');
        Route::get('user_portal/download_work','UserController@downloadWork')->name('download-work');           
        Route::get('user_portal/document/view/{id}','UserController@viewreport'); 
        Route::get('user_portal/document/download/{id}','UserController@downloadreport'); 
        Route::get('user_portal/document/delete/{doc}/{id}','UserController@deletereport'); 
        Route::get('user_portal/profile','UserController@profile')->name('profile');
        Route::post('user_portal/profile/update','HomeController@profileupdate')->name('updateprofile');
        Route::get('user_portal/order_detail/{token}/{tab}/{id}','UserController@orderdeatilbyid');
        Route::get('user_portal/placed_order_detail/{token}/{id}','UserController@placedorderdeatilbyid');
        Route::get('user_portal/placed_order_edit/{token}/{id}','UserController@placedorderedit');
        Route::get('user_portal/revision_detail/{token}/{tab}/{id}','UserController@revisiondeatilbyid');
        Route::post('/order_revision/save','MainController@saverevision');
        Route::post('/user_portal/checkpassword','MainController@checkpassword');
        Route::post('/saveorderform', 'MainController@saveorder')->name('saveorderform');
        Route::post('/updateorderform', 'MainController@updateorder')->name('updateorderform');
});

Route::group(['middleware' => 'admin'], function() {
        Route::get('admin/dashboard','Backend\DashBoardController@index');
        Route::get('admin/orders/new_orders','Backend\OrdersController@index');
        Route::get('admin/orders/inprogress','Backend\OrdersController@inprogressOrder');
        Route::get('admin/orders/completed','Backend\OrdersController@completedOrders');
        Route::get('admin/orders/cancelled','Backend\OrdersController@cancalledOrders');
        Route::get('admin/orders/detail/{type}/{id}','Backend\OrdersController@orderdeatilbyid');
        Route::get('admin/document/download/{id}','Backend\OrdersController@getDownload');    
        Route::get('admin/document/view/{id}','Backend\OrdersController@viewreport'); 
        Route::get('admin/upload/document/delete/{id}','Backend\OrdersController@deleteworkuploaded'); 
        
        Route::post('/admin/orders/status/uploadwork/{id}','Backend\OrdersController@uploadwork'); 
        
        Route::get('admin/orders/status/inprogress/{status}/{id}','Backend\OrdersController@changestatus');
        Route::get('admin/orders/status/done/{status}/{id}','Backend\OrdersController@changestatus');
        Route::get('admin/orders/status/cancelled/{status}/{id}','Backend\OrdersController@changestatus');
        
        
        Route::get('admin/revision/new_revision','Backend\RevisionController@index');
        Route::get('admin/revision/inprogress','Backend\RevisionController@inprogressOrder');
        Route::get('admin/revision/completed','Backend\RevisionController@completedOrders');
        Route::get('admin/revision/cancelled','Backend\RevisionController@cancalledOrders');
        Route::get('admin/revision/detail/{type}/{id}','Backend\RevisionController@orderdeatilbyid');
        Route::get('admin/revision/document/delete/{id}','Backend\RevisionController@deleteworkuploaded'); 
        
        Route::post('/admin/revision/status/uploadwork/{id}','Backend\RevisionController@uploadwork'); 
        
        Route::get('admin/revision/status/inprogress/{status}/{id}','Backend\RevisionController@changestatus');
        Route::get('admin/revision/status/done/{status}/{id}','Backend\RevisionController@changestatus');
        Route::get('admin/revision/status/cancelled/{status}/{id}','Backend\RevisionController@changestatus');
});