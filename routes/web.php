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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('customer');
Route::get('/admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('admin');
Route::get('/manager/home', 'HomeController@managerHome')->name('manager.home')->middleware('manager');
Route::get('/locked', 'HomeController@locked')->name('locked')->middleware('locked');

Route::group(['prefix' => 'manager/book', 'middleware' => ['web', 'auth', 'manager']], function(){
	Route::get('/', 'BookController@getBookListManage')->name('manager.book.index');
	Route::get('/add', 'BookController@showAddBookForm')->name('manager.book.create');
	Route::post('/', 'BookController@addNewBook')->name('manager.book.store');
	Route::post('/add-quantity', 'BookController@addOldBook')->name('manager.book.add-quantity');
	Route::get('/{book}', 'BookController@getBookDetail')->name('book.show');
	Route::get('/{book}/edit', 'BookController@showEditBookForm')->name('manager.book.edit');
	Route::put('/{book}', 'BookController@updateBook')->name('manager.book.update');
	Route::put('/{book}/stop-sale', 'BookController@stopSaleBook')->name('manager.book.update.off-state');
});
