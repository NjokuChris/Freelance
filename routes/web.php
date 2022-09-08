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
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/DB', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth'])->name('dashboard');

Route::resource('/admin/category', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('/admin/formation', App\Http\Controllers\Admin\FormationController::class);
Route::resource('/admin/category-price', App\Http\Controllers\Admin\CategoryPriceController::class);
Route::resource('/admin/freelancer', App\Http\Controllers\Admin\FreelancerController::class);
Route::resource('/admin/units', App\Http\Controllers\Admin\UnitsController::class);


require __DIR__ . '/auth.php';
