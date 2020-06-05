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
//     return view('pn');
// });

Route::match(['get','post'],'/','IndexController@index');
Route::get('/products/{id}','ProductsController@products');
Route::get('/categories/{category_id}','IndexController@categories');
Route::get('/get-product-price', 'ProductsController@getPrice');

//login user
Route::post('/user-login', 'UsersController@login');

//Route for login-register
Route::get('/login-register', 'UsersController@userLoginRegister');
//add user registration
Route::post('/user-register', 'UsersController@register');

//logout
Route::get('/user-logout', 'UsersController@logout');

//Add to Cart
Route::match(['get','post'],'add-cart','ProductsController@addtoCart');

//cart
Route::match(['get','post'],'/cart','ProductsController@Cart')->middleware('verified');

//delete cart product
Route::get('/cart/delete-product/{id}', 'ProductsController@deleteCartProduct');

//update quantity
Route::get('/cart/update-quantity/{id}/{quantity}', 'ProductsController@updateCartQuantity');

//apply coupon code
Route::match(['get','post'],'/cart/apply-coupon', 'ProductsController@applyCoupon');

Route::match(['get','post'],'/admin','AdminController@login');

//for email verification
Auth::routes(['verify'=>true]);


Route::match(['get','post'],'/home','IndexController@home');



//middleware
Route::group(['middleware'=> ['frontlogin']], function(){
	//users account
	Route::match(['get', 'post'], '/account', 'UsersController@account');
	Route::match(['get', 'post'], '/change-password', 'UsersController@changePassword');
	Route::match(['get', 'post'], '/change-address', 'UsersController@changeAddress');
	Route::match(['get', 'post'], '/checkout', 'ProductsController@checkout');
	Route::match(['get', 'post'], '/order-review', 'ProductsController@orderReview');

});


Route::group(['middleware' =>['auth']],function(){

	//Category Route

	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::match(['get','post'],'/admin/view-categories','CategoryController@viewCategories');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::post('/admin/update-category-status', 'CategoryController@updateStatus');


	//Product Route
	Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');
	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/view-products','ProductsController@viewProducts');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@DeleteProduct');
	Route::post('/admin/update-product-status', 'ProductsController@updateStatus');
	Route::post('/admin/update-featured-product-status', 'ProductsController@updateFeatured');

	//Product Attributes
	Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
	Route::match(['get','post'],'/admin/edit-attribute/{id}','ProductsController@editAttributes');
	Route::match(['get','post'],'/admin/add-images/{id}','ProductsController@addImages');
	Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

	//Banners Route
	Route::match(['get','post'], '/admin/banners', 'BannersController@banners');
	Route::match(['get','post'], '/admin/add-banner', 'BannersController@addBanner');
	Route::match(['get','post'], '/admin/edit-banner/{id}', 'BannersController@editBanner');
	Route::match(['get','post'], '/admin/delete-banner/{id}', 'BannersController@deleteBanner');
	Route::post('/admin/update-banner-status', 'BannersController@updateStatus');

	//Coupons Route
	Route::match(['get','post'], '/admin/add-coupon', 'CouponsController@addCoupon');
	Route::match(['get','post'], '/admin/view-coupons', 'CouponsController@viewCoupons');
	Route::match(['get','post'], '/admin/edit-coupon/{id}', 'CouponsController@editCoupon');
	Route::match(['get','post'], '/admin/delete-coupon/{id}', 'CouponsController@deleteCoupon');
	Route::post('/admin/update-coupon-status', 'CouponsController@updateStatus');
});

Route::get('/logout','AdminController@logout');