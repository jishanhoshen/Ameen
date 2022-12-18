<?php

use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('settings', function () {
    $company = Setting::select('*')->get();
    return response()->json([
        'name' => $company[0]->value,
        'email' => $company[1]->value,
        'phone' => $company[2]->value,
        'address' => $company[3]->value,
        'logo' => $company[4]->value,
        'since' => $company[5]->value,
        'facebook' => $company[6]->value,
    ]);
});

Route::get('category', function () {
    $category = Category::select('*')->where('status', 1)->get();
    return response()->json($category);
});
Route::get('products', function () {
    $product = Product::select('products.*', 'categories.name as category')->where('products.status', 1)
        ->join('categories', 'categories.id', 'products.type')
        ->orderBy('products.type', 'asc')->get();

    $temp = '';
    foreach ($product as $item) {
        $productByCat[$item->type][] = $item;
    }

    return response()->json([
        'product' => $product,
        'productByCat' => $productByCat
    ]);
});
