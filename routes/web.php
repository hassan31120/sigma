<?php

use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
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


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {

    Route::get('/', [UserController::class, 'home'])->name('admin.users');
    // Users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Users
    Route::get('/info', [InfoController::class, 'index'])->name('admin.info');
    Route::get('/info/edit/{id}', [InfoController::class, 'edit'])->name('admin.info.edit');
    Route::post('/info/update/{id}', [InfoController::class, 'update'])->name('admin.info.update');

    // partners
    Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partners');
    Route::get('/partner/create', [PartnerController::class, 'create'])->name('admin.partner.create');
    Route::post('/partner/store', [PartnerController::class, 'store'])->name('admin.partner.store');
    Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
    Route::post('/partner/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
    Route::get('/partner/destroy/{id}', [PartnerController::class, 'destroy'])->name('admin.partner.destroy');

    // // Settings
    // // Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    // Route::get('/setting/edit/{id}', [SettingsController::class, 'edit'])->name('admin.setting.edit');
    // Route::post('/setting/update/{id}', [SettingsController::class, 'update'])->name('admin.setting.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
