<?php

use App\Models\City;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminDashboard\AreaController;
use App\Http\Controllers\AdminDashboard\CityController;
use App\Http\Controllers\AdminCompany\ProductController;
use App\Http\Controllers\AdminDashboard\OrderController;
use App\Http\Controllers\AdminCompany\DeliveryController;
use App\Http\Controllers\AdminCompany\Order_customizeController;
use App\Http\Controllers\AdminDashboard\ClientController;
use App\Http\Controllers\AdminDashboard\SettingController;
use App\Http\Controllers\AdminCompany\Order_shopController;
use App\Http\Controllers\AuthController;
use App\Models\Order_customize;

Route::get('/', function () {
    return view('welcome');
   //return view('signin');
//$cities = City::all();
//return view('admin.index',compact('cities'));
//$products = Product::all();
//return view ('companyAdmin.index',compact('products'));
//dd($products);
});

/*Route::get('/signin', function () {
   //return view('signin');
//$cities = City::all();
//return view('admin.index',compact('cities'));
//$products = Product::all();
//return view ('companyAdmin.index',compact('products'));
});*/

Route::get('/adminprofile', function () {
    return view('admin.profile');
})->name('adminprofile');

Route::get('/logout', function () {
    return view('signin');
})->name('logout');


Route::controller(AuthController::class)->group(function (){

    Route::get('/signin','signin')->name('signin');
   Route::post('/login','login')->name('login');
});

//City
Route::controller(CityController::class)->group(function (){

    Route::get('/city/restore/{id}','restore')->name('restore-city');
   Route::get('/city/add','create')->name('add-city');
   Route::post('/city/store','store')->name('store-city');
   Route::get('/cities','index')->name('list-cities');
   Route::get('/city/edit/{id}','edit')->name('edit-city');
   Route::post('/city/update/{id}','update')->name('update-city');
   Route::get('/city/delete/{id}','delete')->name('delete-city');
   Route::get('/cities/deleted','deleted_city')->name('cities-deleted');
});

Route::controller(AreaController::class)->group(function (){

    Route::get('/area/add','create')->name('add-area');
    Route::post('/area/store','store')->name('store-area');
    Route::get('/areas','index')->name('list-areas');
    Route::get('/area/edit/{id}','edit')->name('edit-area');
    Route::post('/area/update/{id}','update')->name('update-area');
    Route::get('/area/delete/{id}','delete')->name('delete-area');
   Route::get('/areas/deleted','deleted_area')->name('areas-deleted');
   Route::get('/area/restore/{id}','restore')->name('restore-area');
});

Route::controller(SettingController::class)->group(function (){

    Route::get('/worktime/add','create')->name('add-worktime');
    Route::post('/worktime/store','store')->name('store-worktime');
    Route::get('/settings','index')->name('list-settings');
    Route::get('/worktime/edit/{id}','edit')->name('edit-worktime');
    Route::post('/worktime/update/{id}','update')->name('update-worktime');
    Route::get('/worktime/delete/{id}','delete')->name('delete-worktime');
    Route::get('/worktime/deleted','deleted_time')->name('worktimes-deleted');
    Route::get('/worktime/restore/{id}','restore')->name('restore-time');
});

Route::controller(ClientController::class)->group(function (){
    Route::get('/persons','index')->name('list-clients');
    Route::get('/client/edit/{id}','edit')->name('edit-client');
    Route::post('/client/update/{id}','update')->name('update-client');
});
/*Route::get('/persons', function () {
    return 'Hello from test';
})->name('list-clients');*/


Route::controller(OrderController::class)->group(function (){

    Route::get('/orders/list','index')->name('list-orders');
    Route::post('/orders/accept','accept')->name('accept-orders');
    Route::delete('/orders/delete',  'delete')->name('delete-order');
    //Route::get('/client/edit/{id}','edit')->name('edit-client');
    //Route::post('/client/update/{id}','update')->name('update-client');
});

Route::controller(DeliveryController::class)->group(function (){

    Route::get('/add/delivery','create')->name('add-delivery');
    Route::get('/list/deliveries','index')->name('list-deliveries');
    Route::post('/store/delivery','store')->name('store-delivery');
    Route::get('/delivery/edit/{id}','edit')->name('edit-delivery');
    Route::post('/delivery/update/{id}','update')->name('update-delivery');
    Route::get('/deliveries/{id}',  'delete')->name('delete-delivery');
    Route::get('/delivery/delete','deleted_delivery')->name('deleted_delivery');
    Route::get('/deliveries/restore/{id}',  'restore')->name('delivery-restore');
});

Route::controller(ProductController::class)->group(function (){
    Route::get('/product/delete/{id}','delete')->name('delete-product');
    Route::get('/add/product','create')->name('add-product');
    Route::get('/gallery/product','gallary')->name('gallary-product');
    Route::post('/store/product','store')->name('store-product');
    Route::get('/product/list','index')->name('list-product');
    Route::get('/product/edit/{id}','edit')->name('edit-product');
    Route::post('/product/update/{id}','update')->name('update-product');
    Route::get('/product/deleted','deleted_product')->name('products-deleted');
    Route::get('/product/restore/{id}','restore')->name('restore-product');
});

Route::controller(Order_shopController::class)->group(function (){

    Route::get('/shop/products','index')->name('shop-products');
    Route::get('/choose/{id}', 'choose')->name('shop-delivery');
    Route::post('/set/{id}', 'set')->name('set-delivery');

});

Route::controller(Order_customizeController::class)->group(function (){

    Route::get('/customize/products','index')->name('custom-products');
    Route::post('/append/{id}','append')->name('append-customize');
    Route::get('/choose/{id}', 'choose')->name('shop-delivery');
    Route::post('/set/{id}', 'set')->name('set-delivery');
});
