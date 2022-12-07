<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GetController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/team', [GetController::class, 'team']);
Route::get('/info', [GetController::class, 'info']);
Route::get('/services', [GetController::class, 'services']);
Route::get('/partners', [GetController::class, 'partners']);
Route::get('/articles', [GetController::class, 'articles']);
Route::get('/article/{id}', [GetController::class, 'article']);
Route::post('/contact', [PostController::class, 'contact']);
Route::post('/order', [PostController::class, 'order']);
Route::get('/apps', [GetController::class, 'apps']);
Route::get('/app/{id}', [GetController::class, 'app']);
Route::get('/products', [GetController::class, 'products']);
Route::get('/product/{id}', [GetController::class, 'product']);
