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

Route::get('/', 'HomeController@welcome')->name('welcome')->middleware('guest');

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
	Route::get('/{book}', 'BookController@getBookDetailManage')->name('manager.book.show');
	Route::get('/{book}/edit', 'BookController@showEditBookForm')->name('manager.book.edit');
	Route::put('/{book}', 'BookController@updateBook')->name('manager.book.update');
	Route::put('/{book}/stop-sale', 'BookController@stopSaleBook')->name('manager.book.update.off-state');
});

Route::group(['prefix' => 'customer/comment', 'middleware' => ['web', 'auth', 'customer']], function(){
	Route::get('/', 'CommentController@getListCommentsOfMember')->name('customer.comment.index');
	
	Route::get('/commentlist/{comment_id}', 'CommentController@getCommentDetail')->name('customer.commentdetail');
	Route::get('waitcommentlist', 'CommentController@getListWaitForComment')->name('customer.waitcommentlist');
	Route::get('waitcommentlist/{book_id}', 'CommentController@showAddCommentForm')->name('customer.comment.create');
	Route::post('/', 'CommentController@addComment')->name('customer.comment.store');
	Route::get('/{comment_id}/delete', 'CommentController@deleteComment')->name('customer.comment.delete');
	Route::get('{comment}/edit', 'CommentController@showEditForm')->name('customer.comment.edit');
	Route::post('/{comment}', 'CommentController@updateComment')->name('customer.comment.update');
});
Route::group(['prefix' => 'manager/order', 'middleware' => ['web', 'auth', 'manager']], function(){
	Route::get('/', 'OrderController@getOrderList')->name('manager.order.list');
	Route::get('/{order}', 'OrderController@getOrderDetail')->name('manager.order.detail');
	Route::get('/{order}/cancel', 'OrderController@cancelManager')->name('manager.order.cancel');
	Route::get('/{order}/updatestate', 'OrderController@showUpdateStateForm')->name('manager.order.updatestate');
	Route::get('/edit/{order}', 'OrderController@updateOrderState')->name('manager.order.editstate');
});

Route::group(['prefix' => 'manager/report', 'middleware' => ['web', 'auth', 'manager']], function(){
	Route::get('/', 'ReportController@showReportForm')->name('manager.report.index');
	Route::get('/revenue', 'ReportController@getRevenueReport')->name('manager.report.revenue');
	Route::get('/profit', 'ReportController@getProfitReport')->name('manager.report.profit');
	Route::get('/inventory', 'ReportController@getInventoryReport')->name('manager.report.inventory');
	
});

Route::get('/book/{book}', 'BookController@getBookDetail')->name('book.show')
->middleware(['not-admin', 'not-manager', 'not-locked']);
Route::get('book/{id}/comment', 'CommentController@getCommentsOfBook')->name('book.comment');

Route::group(['middleware' => ['web', 'auth', 'customer']], function(){
	Route::group(['prefix' => 'cart'], function(){
		Route::post('/add', 'CartController@addToCart')->name('cart.add');
		Route::get('/', 'CartController@showCart')->name('cart.index');
		Route::delete('delete/{cart}', 'CartController@delete')->name('cart.destroy');
		Route::put('/{cart}/update', 'CartController@updateQuantity')->name('cart.update-quantity');
	});
	Route::group(['prefix' => 'order'], function(){
		Route::post('/add', 'OrderController@addOrder')->name('order.add');
		Route::get('/{order}', 'OrderController@getOrderMemberDetail')->name('order.show');
		Route::get('/', 'OrderController@getOrderMemberList')->name('order.index');
		Route::get('/{order}/state-history', 'OrderController@getOrderStateHistory')
		->name('order.state-history')->middleware('owner');
		Route::get('/{order}/cancel', 'OrderController@cancelOrder')
		->name('order.cancel')->middleware('owner');
	});	
});

Route::group(['prefix' => 'profile', 'middleware' => ['web', 'auth', 'not-locked']], function(){
	Route::get('/', 'UserController@getProfile')->name('user.profile');
	Route::post('/', 'UserController@updateProfile')->name('user.update-profile');
	Route::get('/password-change', 'UserController@showChangePasswordForm')->name('user.show.password-change');
	Route::post('/password-change', 'UserController@changePassword')->name('user.password-change');
});

Route::group(['prefix' => 'admin/user', 'middleware' => ['web', 'auth', 'admin']], function(){
	Route::get('/account-list', 'UserController@getListAccount')->name('admin.user.account-list');
	Route::get('/account/{user}/lock', 'UserController@lockAccount')->name('admin.user.account.lock');
	Route::get('/account/{user}/unlock-to-customer', 'UserController@unlockAccountCustomer')->name('admin.user.account.unlock-customer');
	Route::get('/account/{user}/unlock-to-manager', 'UserController@unlockAccountManager')->name('admin.user.account.unlock-manager');
	Route::post('/account/add', 'UserController@addStaff')->name('admin.user.account.add');
	Route::get('/permission-manage', 'UserController@getListStaff')->name('admin.user.permission-manage');
	Route::put('/{user}/update-permission', 'UserController@updatePermission')->name('update-permission');
});
