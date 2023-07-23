<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\ProductController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\CartController;
use App\Http\Controllers\site\CheckOutController;
use App\Http\Controllers\site\UserAddressController;
use Illuminate\Support\Facades\Auth;



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

Route::get('/dashboard', function () {
    return view('dashboard.categories.index');
})->name('index');

Auth::routes();

Route::get('/' , [HomeController::class , 'index' ])->name('index');
Route::get('product/{product}' ,[ProductController::class , 'show'])->name('product.show');
Route::post('/cart' , [CartController::class , 'store'] )
    ->name('cart.store');


Route::middleware(['auth'])->group(function(){
    //cart
    Route::get('cart' , [CartController::class,'show'])->name('cart.show');
    Route::get('cart/{cart}' , [CartController::class , 'deleteItem'])->name('cartItem.delete');
    Route::put('/cart/update/{id}', [CartController::class , 'update'])->name('cartItem.update');

    //checkout
    Route::get('checkout' , [CheckOutController::class , 'index'])->name('checkout.index');
    Route::POST('place-order' , [CheckOutController::class , 'placeOrder'])->name('placeOrder');
    // Route::resource('user_address', UserAddressController::class);
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('index');})
    ->name('logout');



