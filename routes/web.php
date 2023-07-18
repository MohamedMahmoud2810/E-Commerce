<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\ProductController;
use App\Http\Controllers\site\HomeController;

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
