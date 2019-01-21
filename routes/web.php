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

Route::get('/', 'GuestController@index')->name('guest.index');

Route::get('/home','HomeController@index');
Route::post('/topup', 'TopUpController@userTopUp')->name('user.topup');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/categories/{id}', 'ShopController@showCategories')->name('shop.categories');
Route::get('/shop/item/{id}', 'ShopController@showItem')->name('shop.item');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');
Route::post('/buy', 'TransactionController@buyItem')->name('buy');
Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
    Route::get('create', 'ItemController@create')->name('admin.create');
    Route::post('post', 'ItemController@store')->name('admin.store');
    Route::get('edit/{item}', 'ItemController@edit')->name('admin.edit');
    Route::patch('update/{item}', 'ItemController@update')->name('admin.update');
    Route::delete('delete/{id}', 'ItemController@destroy')->name('admin.delete');
    Route::get('topup', 'AdminController@viewTopUp')->name('admin.topup.view');
    Route::post('topup/{id}', 'AdminController@verifyTopUp')->name('admin.topup.verify');
    Route::resource('categories', 'CategoryController');
    Route::get('transaction', 'TransactionController@index')->name('transaction');
  });

