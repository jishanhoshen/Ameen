<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('app');
});

// Route::get('/phpinfo', function () {
//     return phpinfo();
// });

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'category',],function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/create', [CategoryController::class, 'create'])->name('createcategory');
        Route::post('/store', [CategoryController::class, 'store'])->name('storecategory');
        Route::post('/edit', [CategoryController::class, 'edit'])->name('editcategory');
        Route::post('/destroy', [CategoryController::class, 'destroy'])->name('destroycategory');
    });
    Route::group(['prefix' => 'products',],function(){
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/create', [ProductController::class, 'create'])->name('createproduct');
        Route::post('/store', [ProductController::class, 'store'])->name('storeproduct');
        Route::post('/edit', [ProductController::class, 'edit'])->name('editproduct');
        Route::post('/destroy', [ProductController::class, 'destroy'])->name('destroyproduct');
    });
    Route::group(['prefix' => 'settings',],function(){
        Route::get('/', [HomeController::class, 'settings'])->name('settings');
        Route::post('/update', [HomeController::class, 'settingsUpdate'])->name('settingsUpdate');
    });
});
