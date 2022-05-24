<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/userlogin', 'App\Http\Controllers\API\Auth\AuthController@userlogin');
Route::post('/userregister', 'App\Http\Controllers\API\Auth\AuthController@register');
Route::get('/userregister', 'App\Http\Controllers\API\Auth\AuthController@up');

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/userdetails', 'App\Http\Controllers\API\Auth\AuthController@details');
  Route::get('/users', 'App\Http\Controllers\API\UserController@users');
  Route::post('/userchangepassword', 'App\Http\Controllers\API\Auth\AuthController@userchangepassword');

  // Shawal Ahmad
  Route::post('/user/manage/address', 'App\Http\Controllers\API\Auth\AuthController@manage_address');
  Route::post('/user/delete/address', 'App\Http\Controllers\API\Auth\AuthController@remove_address');

  Route::post('/user/update/profile','App\Http\Controllers\API\Auth\AuthController@update_profile');
  Route::post('/user/update/photo','App\Http\Controllers\API\Auth\AuthController@update_photo');
  Route::post('/user/update/password', 'App\Http\Controllers\API\Auth\AuthController@userchangepassword');

  Route::get('/get/favourite/products', 'App\Http\Controllers\API\WishlistController@fetch');
  Route::post('/add/favourite/product', 'App\Http\Controllers\API\WishlistController@create');
  Route::post('/remove/favourite/product', 'App\Http\Controllers\API\WishlistController@delete');

  Route::get('/user/orders', 'App\Http\Controllers\API\OrderController@fetch');
  Route::post('/user/create/order', 'App\Http\Controllers\API\OrderController@create');
  
  Route::get('/get/payment/methods', 'App\Http\Controllers\API\PaymentGatewayController@fetch');
  Route::get('/get/shipping/methods', 'App\Http\Controllers\API\ShippingServicesController@fetch');
  
});

Route::post('/userforgetpassword', 'App\Http\Controllers\API\Auth\AuthController@userforgetpassword');
Route::post('/userentercode', 'App\Http\Controllers\API\Auth\AuthController@userentercode');
Route::post('/index', 'App\Http\Controllers\API\FrontendController@index');
Route::get('/getcategories', 'App\Http\Controllers\API\FrontendController@getcategories');
//festivals
Route::get('/festivals', 'App\Http\Controllers\API\FrontendController@fastival');
Route::post('/festivals', 'App\Http\Controllers\API\FrontendController@addfestivals');
//top brand
Route::get('/topbrand', 'App\Http\Controllers\API\FrontendController@topBrand');
Route::post('/topbrand/{id}', 'App\Http\Controllers\API\FrontendController@topshopdetails');
//grocery route
Route::get('/groceryshop', 'App\Http\Controllers\API\FrontendController@groceryShop');
Route::get('/groceryshop/{id}', 'App\Http\Controllers\API\FrontendController@groceryshopdetails');
//wishlist
//Route::get('/wishlists', 'App\Http\Controllers\API\FrontendController@wishlists');
// Route::get('/wishlists', 'App\Http\Controllers\API\FrontendController@wishlistsdetail');
// Route::post('/wishlists', 'App\Http\Controllers\API\FrontendController@addwishlist');
// Route::get('/wishlist/product/{id}/delete', 'App\Http\Controllers\API\FrontendController@delete')->name('customer-wish-delete');
//Route::get('/wishlists/{sort}', 'App\Http\Controllers\API\FrontendController@wishlistsort')->name('customer-wishlistsort');
//order-submit
// Route::get('/order-submit', 'App\Http\Controllers\API\FrontendController@order');
// Route::post('/order-submit', 'App\Http\Controllers\API\FrontendController@addorders');
//search
Route::get('/search/{name}','App\Http\Controllers\API\FrontendController@search');
//
// Route::post('/profile_update/{id}','App\Http\Controllers\API\FrontendController@update');
// Route::post('/changephoto/{id}','App\Http\Controllers\API\FrontendController@changephoto');

Route::post('/subcategories', 'App\Http\Controllers\API\FrontendController@getsubcategories');
Route::post('/childcategories', 'App\Http\Controllers\API\FrontendController@childcats');
Route::post('/productdetail', 'App\Http\Controllers\API\FrontendController@product');
Auth::routes(['verify' => true]);
Route::get('/getcatpros/{id}', 'App\Http\Controllers\API\ProductController@categorypros');
Route::get('/getsubcatpros/{id}', 'App\Http\Controllers\API\ProductController@subcategorypros');
Route::get('/getchildcatpros/{id}', 'App\Http\Controllers\API\ProductController@childcategorypros');

// Shawal Ahmad Mohmand
Route::get('/get/sliders/all', 'App\Http\Controllers\API\SliderController@get_sliders_all');

Route::get('/get/deal_of_the_day', 'App\Http\Controllers\API\ProductController@get_deal_of_the_day');
Route::get('/get/top/products', 'App\Http\Controllers\API\ProductController@get_top_products');
Route::get('/get/featured/products', 'App\Http\Controllers\API\ProductController@get_featured_products');
Route::get('/get/best/products', 'App\Http\Controllers\API\ProductController@get_best_products');
Route::get('/get/hot/products', 'App\Http\Controllers\API\ProductController@get_hot_products');

Route::get('/all/shops', 'App\Http\Controllers\API\ShopsController@fetch_all_shops');
Route::get('/featured/shops', 'App\Http\Controllers\API\ShopsController@fetch_featured_shops');
Route::get('/grocery/shops', 'App\Http\Controllers\API\ShopsController@fetch_grocery_shops');
Route::get('/top/rated/shops', 'App\Http\Controllers\API\ShopsController@fetch_top_rated_shops');
Route::get('/brand/shops', 'App\Http\Controllers\API\ShopsController@fetch_brand_shops');
Route::post('/search/shops', 'App\Http\Controllers\API\ShopsController@search_shops');


// Leopards
Route::get('/charges/leopard/{product}/{vendor}/{city}', 'App\Http\Controllers\Shipping\LeopardsController@get_charges');


Route::get('/test', 'App\Http\Controllers\Shipping\LeopardsController@test');


//Customer
Route::post('/customer_register', 'App\Http\Controllers\API\Auth\CustomerAuthController@register');
Route::post('/customer_login', 'App\Http\Controllers\API\Auth\CustomerAuthController@customerlogin');
Route::post('/customer_forgot', 'App\Http\Controllers\API\Auth\CustomerAuthController@customer_forgot');

Route::post('/customer_profile', 'App\Http\Controllers\API\Auth\CustomerAuthController@customer_profile');


//test