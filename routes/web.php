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

Route::get('/', 'HomeController@index');

//show product by category_id
Route::get('/product_by_category/{category_id}', 'HomeController@show_product_by_category');
//brand wise product routes
Route::get('/product_by_brand/{brand_id}', 'HomeController@show_product_by_brand');

//view product routes
Route::get('/view_product/{product_id}', 'HomeController@product_details_by_id');

//cart routes
//cart routes
Route::post('/add_to_cart', 'CartController@add_to_cart');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/delete_to_cart/{id}', 'CartController@delete_to_cart');
Route::post('/update_cart', 'CartController@update_cart');

Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin_dashboard', 'AdminController@dashboard');

///checkout
Route::get('/login_check', 'CheckoutController@login_check');
Route::post('/customer_registration', 'CheckoutController@customer_registration');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/save_shipping_details', 'CheckoutController@save_shipping_details');
//customer_login
Route::post('/customer_login', 'CheckoutController@customer_login');
Route::post('/customer_logout', 'CheckoutController@customer_logout');

//payment
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order_place', 'CheckoutController@order_place');

//manage order
Route::get('/manage_order', 'CheckoutController@manage_order');
Route::get('/view_order/{order_id}', 'OrderController@view_order');



//Category releted
Route::get('/add_category', 'CategoryController@index');
Route::get('/all_category', 'CategoryController@all_category');
Route::post('/save_category', 'CategoryController@save_category');
Route::get('/unpublished_category/{category_id}', 'CategoryController@unpublished_category');
Route::get('/published_category/{category_id}', 'CategoryController@published_category');
Route::get('/edit_category/{category_id}', 'CategoryController@edit_category');
Route::post('/update_category/{category_id}', 'CategoryController@update_category');
Route::get('/delete_category/{category_id}', 'CategoryController@delete_category');

//brands related
Route::get('/add_brand', 'BrandController@index');
Route::get('/all_brand', 'BrandController@all_brand');
Route::post('/save_brand', 'BrandController@save_brand');
Route::get('/edit_brand/{brand_id}', 'BrandController@edit_brand');
Route::post('/update_brand/{brand_id}', 'BrandController@update_brand');
Route::get('/delete_brand/{brand_id}', 'BrandController@delete_brand');
Route::get('/unpublished_brand/{brand_id}', 'BrandController@unpublished_brand');
Route::get('/published_brand/{brand_id}', 'BrandController@published_brand');


//Products
Route::get('/add_product', 'ProductController@index');
Route::get('/all_product', 'ProductController@all_product');
Route::post('/save_product', 'ProductController@save_product');
Route::get('/edit_product/{product_id}', 'ProductController@edit_product');
Route::post('/update_product/{product_id}', 'ProductController@update_product');
Route::get('/delete_product/{product_id}', 'ProductController@delete_product');
Route::get('/unpublished_product/{product_id}', 'ProductController@unpublished_product');
Route::get('/published_product/{product_id}', 'ProductController@published_product');