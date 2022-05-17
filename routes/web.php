<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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


Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'Login'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'userCreate'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');

/*Route::group(['prefix' => 'product'], function (){
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/new', [ProductController::class, 'create'])->name('product.create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/delete', [ProductController::class, 'destroy'])->name('delete');
});*/

Route::resource('products', 'ProductController');

Route::get('/frontend', 'UserController@frontend');
Route::get('/email', function (){
    Mail::to('martin.haxhia@atis.al')->send(new WelcomeMail('martini'));
    return new WelcomeMail('martini');
});
