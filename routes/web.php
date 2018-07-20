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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/categories/{categorie_id}', 'CategoriesController@index')->name('categories');

Route::get('/product/{product_id}', 'ProductController@index')->name('product');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/article/{news_id}', 'NewsController@article')->name('news.article');

Route::group(['prefix' => 'cart', 'middleware' => 'registered'], function () {
    Route::get('/', 'CartController@index')->name('cart');
    Route::get('/add/{product_id}', 'CartController@add')->name('cart.add');
    Route::get('/delete/{orderPosition_id}', 'CartController@delete')->name('cart.delete');
    Route::post('/send', 'CartController@send')->name('cart.send');
});

Route::get('/orders', 'MyOrdersController@index')->name('myOrders')->middleware('registered');

Route::group(['prefix' => 'admin', 'middleware' => 'adminOnly'], function () {

    Route::get('/', function () {
        return redirect()->route('admin.settings');
    })->name('admin');
    Route::get('/settings', 'Admin\SettingsController@index')->name('admin.settings');
    Route::post('/settings/send', 'Admin\SettingsController@send')->name('admin.settings.send');
    Route::get('/categories', 'Admin\CategoriesController@index')->name('admin.categories');
    Route::get('/categories/create', 'Admin\CategoriesController@create')->name('admin.categories.create');
    Route::post('/categories/create', 'Admin\CategoriesController@create')->name('admin.categories.create_post');
    Route::get('/categories/edit/{categorie_id}', 'Admin\CategoriesController@edit')->name('admin.categories.edit');
    Route::post('/categories/edit/{categorie_id}', 'Admin\CategoriesController@edit')->name('admin.categories.edit_post');
    Route::get('/categories/delete/{categorie_id}', 'Admin\CategoriesController@delete')->name('admin.categories.delete');
    Route::get('/products', 'Admin\ProductsController@index')->name('admin.products');
    Route::get('/products/create', 'Admin\ProductsController@create')->name('admin.products.create');
    Route::post('/products/create', 'Admin\ProductsController@create')->name('admin.products.create_post');
    Route::get('/products/edit/{product_id}', 'Admin\ProductsController@edit')->name('admin.products.edit');
    Route::post('/products/edit/{product_id}', 'Admin\ProductsController@edit')->name('admin.products.edit_post');
    Route::get('/products/delete/{product_id}', 'Admin\ProductsController@delete')->name('admin.products.delete');
    Route::get('/orders', 'Admin\OrdersController@index')->name('admin.orders');
    Route::get('/orders/view/{order_id}', 'Admin\OrdersController@view')->name('admin.orders.view');
    Route::get('/news', 'Admin\NewsController@index')->name('admin.news');
    Route::get('/news/create', 'Admin\NewsController@create')->name('admin.news.create');
    Route::post('/news/create', 'Admin\NewsController@create')->name('admin.news.create_post');
    Route::get('/news/edit/{news_id}', 'Admin\NewsController@edit')->name('admin.news.edit');
    Route::post('/news/edit/{news_id}', 'Admin\NewsController@edit')->name('admin.news.edit_post');
    Route::get('/news/delete/{news_id}', 'Admin\NewsController@delete')->name('admin.news.delete');
});