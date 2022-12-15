<?php

use App\Http\Controllers\HomeController;
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

Route::prefix('admin')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings', [HomeController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [HomeController::class, 'settingsUpdate'])->name('settingsUpdate');
});
