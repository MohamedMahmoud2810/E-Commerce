<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



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
Route::get('/index', [IndexController::class , 'index'])->name('admin');
Route::group(['as'=>'dashboard.'] , function(){
    Route::Put('settings/{setting}' , [SettingController::class , 'update'])->name('settings.update');
    Route::get('settings' , [SettingController::class , 'index'])->name('settings.index');
    Route::get('categories/all' , [CategoryController::class , 'getall'])->name('categories.getall');
    Route::resource('category',CategoryController::class)->except('destroy' , 'show');
    Route::resource('user', UserController::class)->except('show' , 'destroy');
    Route::get('user/delete/{user}',[UserController::class , 'delete'])->name('user.delete');
    Route::get('category/delete/{category}',[CategoryController::class , 'delete'])->name('category.delete');
    Route::resource('product', ProductController::class)->except('show','destroy');
    Route::delete('product/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::delete('/images/{images}', [ProductController::class, 'deleteImage'])->name('deleteImage');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('site.home');
    })->name('logout');
});

