<?php

use App\Http\Controllers\Admin\AppCatController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GraphicCatController;
use App\Http\Controllers\Admin\GraphicController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\MotionCatController;
use App\Http\Controllers\Admin\MotionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
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

    // cats
    Route::get('/cats', [CatController::class, 'index'])->name('admin.cats');
    Route::get('/cat/create', [CatController::class, 'create'])->name('admin.cat.create');
    Route::post('/cat/store', [CatController::class, 'store'])->name('admin.cat.store');
    Route::get('/cat/edit/{id}', [CatController::class, 'edit'])->name('admin.cat.edit');
    Route::post('/cat/update/{id}', [CatController::class, 'update'])->name('admin.cat.update');
    Route::get('/cat/destroy/{id}', [CatController::class, 'destroy'])->name('admin.cat.destroy');

    // products
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    // // Settings
    // // Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    // Route::get('/setting/edit/{id}', [SettingsController::class, 'edit'])->name('admin.setting.edit');
    // Route::post('/setting/update/{id}', [SettingsController::class, 'update'])->name('admin.setting.update');

    // app cats
    Route::get('/Appcats', [AppCatController::class, 'index'])->name('admin.Appcats');
    Route::get('/Appcat/create', [AppCatController::class, 'create'])->name('admin.Appcat.create');
    Route::post('/Appcat/store', [AppCatController::class, 'store'])->name('admin.Appcat.store');
    Route::get('/Appcat/edit/{id}', [AppCatController::class, 'edit'])->name('admin.Appcat.edit');
    Route::post('/Appcat/update/{id}', [AppCatController::class, 'update'])->name('admin.Appcat.update');
    Route::get('/Appcat/destroy/{id}', [AppCatController::class, 'destroy'])->name('admin.Appcat.destroy');

    // motion cats
    Route::get('/motioncats', [MotionCatController::class, 'index'])->name('admin.motioncats');
    Route::get('/motioncat/create', [MotionCatController::class, 'create'])->name('admin.motioncat.create');
    Route::post('/motioncat/store', [MotionCatController::class, 'store'])->name('admin.motioncat.store');
    Route::get('/motioncat/edit/{id}', [MotionCatController::class, 'edit'])->name('admin.motioncat.edit');
    Route::post('/motioncat/update/{id}', [MotionCatController::class, 'update'])->name('admin.motioncat.update');
    Route::get('/motioncat/destroy/{id}', [MotionCatController::class, 'destroy'])->name('admin.motioncat.destroy');

    // motions
    Route::get('/motions', [MotionController::class, 'index'])->name('admin.motions');
    Route::get('/motion/create', [MotionController::class, 'create'])->name('admin.motion.create');
    Route::post('/motion/store', [MotionController::class, 'store'])->name('admin.motion.store');
    Route::get('/motion/edit/{id}', [MotionController::class, 'edit'])->name('admin.motion.edit');
    Route::post('/motion/update/{id}', [MotionController::class, 'update'])->name('admin.motion.update');
    Route::get('/motion/destroy/{id}', [MotionController::class, 'destroy'])->name('admin.motion.destroy');

    // graphic cats
    Route::get('/graphiccats', [GraphicCatController::class, 'index'])->name('admin.graphiccats');
    Route::get('/graphiccat/create', [GraphicCatController::class, 'create'])->name('admin.graphiccat.create');
    Route::post('/graphiccat/store', [GraphicCatController::class, 'store'])->name('admin.graphiccat.store');
    Route::get('/graphiccat/edit/{id}', [GraphicCatController::class, 'edit'])->name('admin.graphiccat.edit');
    Route::post('/graphiccat/update/{id}', [GraphicCatController::class, 'update'])->name('admin.graphiccat.update');
    Route::get('/graphiccat/destroy/{id}', [GraphicCatController::class, 'destroy'])->name('admin.graphiccat.destroy');

    // graphics
    Route::get('/graphics', [GraphicController::class, 'index'])->name('admin.graphics');
    Route::get('/graphic/create', [GraphicController::class, 'create'])->name('admin.graphic.create');
    Route::post('/graphic/store', [GraphicController::class, 'store'])->name('admin.graphic.store');
    Route::get('/graphic/edit/{id}', [GraphicController::class, 'edit'])->name('admin.graphic.edit');
    Route::post('/graphic/update/{id}', [GraphicController::class, 'update'])->name('admin.graphic.update');
    Route::get('/graphic/destroy/{id}', [GraphicController::class, 'destroy'])->name('admin.graphic.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
