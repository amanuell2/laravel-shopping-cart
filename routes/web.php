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

Route::get('/', 'ProductController@getIndex')->name('product.index');
Route::get('/getProductImage/{filename}', 'ProductController@getProductImage')->name('product.getImage');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.AddToCart');

Route::get('/shopping-cart', 'ProductController@getCart')->name('product.ShoppingCart');
Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduce');
Route::get('/remove/{id}', 'ProductController@getReduceAll')->name('product.remove');

Route::get('/checkout', 'ProductController@getCheckout')->name('checkout')->middleware('auth');
Route::post('/checkout', 'ProductController@PostCheckout')->name('checkout')->middleware('auth');

Route::group(['prefix' => 'user'], function () {

    Route::group(['middleware' => 'guest'], function () {
        //get and post sign up
        Route::get('/signup', 'userController@getSignUp')->name('user.signUp');
        Route::post('/signup', 'userController@postSingUP')->name('user.signUp');

//get and post sign in
        Route::get('/signin', 'userController@getSignIn')->name('user.signIn');
        Route::post('/signin', 'userController@postSingIn')->name('user.signIn');
    });
    Route::group(['middleware' => 'auth'], function () {
        //get profile
        Route::get('/profile', 'userController@getProfile')->name('user.profile');
        //get product add
        Route::get('/addProduct', 'ProductController@getProduct')->name('product.add');
        //post product
        Route::post('/addProduct', 'ProductController@postProduct')->name('product.add');
        //get each product

//log out user

        Route::get('/logout', 'userController@userLogout')->name('user.logout');
    });

});
