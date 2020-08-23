<?php

use Illuminate\Support\Facades\Route;


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
Route::get('/listcart', 'CartController@listCart')->name('cart.list');
Route::get('/add/cart/{id}' , 'CartController@addCart')->name('cart.add');
/* route for category */
Route::get('/category', 'admin\AdminController@category')->name('category');
Route::post('/category/save', 'admin\AdminController@saveCategory')->name('category.save');
Route::get('/category/delete/{id}', 'admin\AdminController@deleteCategory')->name('category.delete');
Route::get('categoryedit/{id}', 'admin\AdminController@editCategory')->name('category.edit');
Route::post('category-update', 'admin\AdminController@updateCategory')->name('category.update');
Route::get('/category/add', 'admin\AdminController@addCategory')->name('category.add');
Route::get('/users', 'admin\AdminController@users')->name('users');

/* route for product */
Route::get('/products', 'admin\AdminController@product')->name('product');
Route::get('/product/add', 'admin\AdminController@addProduct')->name('product.add');
Route::post('/product/save', 'admin\AdminController@saveProduct')->name('product.save');
Route::get('/product/edit/{id}', 'admin\AdminController@editProduct')->name('product.edit');
Route::post('/product/update', 'admin\AdminController@updateProduct')->name('product.update');
Route::get('/product/delete/{id}', 'admin\AdminController@deleteProduct')->name('product.delete');



Route::post('changeStatus', 'admin\AdminController@changeStatus');


Auth::routes();

Route::get('/', 'HomeController@listProduct')->name('product.list');

Auth::routes();

Route::get('/home', 'HomeController@listProduct')->name('product.list');

 