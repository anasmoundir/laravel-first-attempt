<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServantsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);


Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [\App\Http\Controllers\MenuController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
Route::resource("menus", 'App\Http\Controllers\MenuController');
Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

// Route::PUT('menus/{servants}', [ServantsController::class, 'update'])->name('menus.update')->middleware(['auth']);

require __DIR__ . '/auth.php';
