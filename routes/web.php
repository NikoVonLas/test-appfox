<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class, 'index']);

Route::get('/auth/{id?}', [TestController::class, 'changeUser'])->name('change-user');

Route::get('/create-product', [TestController::class, 'createProduct'])->name('product.create');
Route::get('/create-news', [TestController::class, 'createNews'])->name('news.create');
