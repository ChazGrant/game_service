<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/about', [MainController::class, 'about']);

Route::get('/reviews', [MainController::class, 'reviews'])->name("reviews");

Route::post('/reviews/check', [MainController::class, 'reviews_check']);

Route::get('/auth', [AuthController::class, 'auth']);

Route::post("/auth/check", [AuthController::class, 'Authenticate']);

Route::get('/reg', [AuthController::class, 'Registrate']);

Route::post("/reg/check", [AuthController::class, 'reg_check']);

Route::get("/profile", [MainController::class, 'profile']);

Route::get("/logout", [AuthController::class, 'logout']);

Route::get('/games', [MainController::class, 'games']);

Route::get("/games/{gameTitle}", [MainController::class, 'game']);
