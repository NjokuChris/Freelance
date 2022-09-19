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

// Route::get('/dashboard', function () {
//     return view('layouts.admin');
// })->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('layouts.admin');
    });
    Route::resource('/admin/stories', App\Http\Controllers\Admin\StoriesController::class);
    Route::resource('/admin/category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/admin/formation', App\Http\Controllers\Admin\FormationController::class);
    Route::resource('/admin/category-price', App\Http\Controllers\Admin\CategoryPriceController::class);
    Route::resource('/admin/page-size', App\Http\Controllers\Admin\PageSizeController::class);
    Route::resource('/admin/freelancers', App\Http\Controllers\Admin\FreelancerController::class);
    Route::resource('/admin/units', App\Http\Controllers\Admin\UnitsController::class);
    Route::resource('/admin/stories', App\Http\Controllers\Admin\StoriesController::class);
    Route::resource('/admin/users', App\Http\Controllers\Admin\UserController::class);
});


require __DIR__ . '/auth.php';
