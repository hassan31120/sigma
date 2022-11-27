<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
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

    // teams
    Route::get('/teams', [TeamController::class, 'index'])->name('admin.teams');
    Route::get('/team/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('/team/store', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('admin.team.edit');
    Route::post('/team/update/{id}', [TeamController::class, 'update'])->name('admin.team.update');
    Route::get('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('admin.team.destroy');

    // contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::get('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');

    // orders
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/order/destroy/{id}', [OrderController::class, 'destroy'])->name('admin.order.destroy');

    // services
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::get('/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    // articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::post('/article/update/{id}', [ArticleController::class, 'update'])->name('admin.article.update');
    Route::get('/article/destroy/{id}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

    // apps
    Route::get('/apps', [AppController::class, 'index'])->name('admin.apps');
    Route::get('/app/create', [AppController::class, 'create'])->name('admin.app.create');
    Route::post('/app/store', [AppController::class, 'store'])->name('admin.app.store');
    Route::get('/app/edit/{id}', [AppController::class, 'edit'])->name('admin.app.edit');
    Route::post('/app/update/{id}', [AppController::class, 'update'])->name('admin.app.update');
    Route::get('/app/destroy/{id}', [AppController::class, 'destroy'])->name('admin.app.destroy');

    // // Settings
    // // Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    // Route::get('/setting/edit/{id}', [SettingsController::class, 'edit'])->name('admin.setting.edit');
    // Route::post('/setting/update/{id}', [SettingsController::class, 'update'])->name('admin.setting.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
