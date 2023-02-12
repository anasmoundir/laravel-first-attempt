<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServantsController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', 'App\Http\Controllers\CategoryController')->except([
    'update'
]);

Route::PUT('categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware(['auth']);
Route::resource("tables", 'App\Http\Controllers\TableController')->except(['update']);
Route::PUT('tables/{table}', [TableController::class, 'update'])->name('tables.update')->middleware(['auth']);
Route::resource("servants", 'App\Http\Controllers\ServantsController')->except(['update']);
Route::PUT('servants/{servants}', [ServantsController::class, 'update'])->name('servants.update')->middleware(['auth']);
Route::resource("menus", 'App\Http\Controllers\MenuController')->except(['update']);
require __DIR__ . '/auth.php';
