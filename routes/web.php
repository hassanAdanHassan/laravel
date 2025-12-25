<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Index
// Create
// Edit


Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified']);



Route::resource("show", CategoryController::class)->only(["show","update",'destory']);
Route::resource('product', ProductsController::class)->only(['index','show','update']);


Route::resource('category', CategoryController::class)->middleware('auth');

Route::prefix('users')->middleware(['auth', 'verified', 'can:create-user'])->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users/profile', [UsersController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/users/profile', [UsersController::class, 'profileUpdate'])->name('profile.update');
});

require __DIR__.'/auth.php';
