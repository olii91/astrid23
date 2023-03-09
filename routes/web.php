<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['checkLevel:admin'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->middleware(['checkLevel:admin'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->middleware(['checkLevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['checkLevel:admin'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['checkLevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware(['checkLevel:admin'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('user.delete');

Route::get('complaint', [App\Http\Controllers\ComplaintsController::class, 'index'])->middleware(['auth'])->name('complaint.index');
Route::get('complaint/create', [App\Http\Controllers\ComplaintsController::class, 'create'])->middleware(['auth'])->name('complaint.create');
Route::post('complaint/store', [App\Http\Controllers\ComplaintsController::class, 'store'])->middleware(['auth'])->name('complaint.store');
Route::delete('complaint/delete/{id}', [App\Http\Controllers\ComplaintsController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('complaint.delete');

