<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use App\Mail\WelcomeMail;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login','Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('admin/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
    // Admin Dashboard
    Route::get('dashboard','AdminController@dashboard')->name('dashboard');
});
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('login', [UserController::class, 'index'])->name('login');
Route::get('Account', [UserController::class, 'singleUser'])->name('user.Account');
Route::get('Details', [UserController::class, 'userDetails'])->name('user.details');
Route::get('Address', [UserController::class, 'userAddress'])->name('user.address');
Route::post('address-create', [UserController::class, 'addressCreate'])->name('address.create');
Route::get('users.show', [UserController::class, 'show'])->name('customers');
Route::post('custom-login', [UserController::class, 'Login'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'userCreate'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::get('restoreAll', [ProductController::class, 'restoreAll'])->name('products.restoreAll');
Route::get('restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
Route::get('delete/{id}',[ProductController::class,'delete'])->name('delete');
Route::get('products.show', [ProductController::class, 'show'])->name('products');
/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::resource('products', 'ProductController');
/*
|--------------------------------------------------------------------------
| Email Routes
|--------------------------------------------------------------------------
*/
Route::get('/frontend', 'UserController@frontend');
Route::get('/email', function (){
    Mail::to('martin.haxhia@atis.al')->send(new WelcomeMail('martini'));
    return new WelcomeMail('martini');
});
/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
Route::post('removeAll', [CartController::class, 'removeAll'])->name('clearCart');
