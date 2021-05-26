<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
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

Route::middleware(['auth:sanctum,admin'])->get('admin/dashboard', function () {
    return view('admin.dashboard');
});

/*Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');*/

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.home');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'admin:admin'], function(){
    Route::get('/loginA', [AdminController::class, 'login'])-> name('admin.login');
    Route::post('/login', [AdminController::class, 'store'])-> name('admin.login.store');
    Route::get('/logout', [AdminController::class, 'destroy'])-> name('admin.logout');

});
Route::group(['prefix' => 'user', 'middleware' => 'admin:admin'], function(){
    Route::get('/logout', [UserController::class, 'logout'])-> name('user.logout');
    Route::get('/profile', [UserController::class, 'profile'])-> name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])-> name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'update'])-> name('profile.update');
    Route::get('/profile/password/change', [UserController::class, 'passIndex'])-> name('profile.password.view');
    Route::post('/profile/password/store', [UserController::class, 'passStore'])-> name('profile.password.store');


});

