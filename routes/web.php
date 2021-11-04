<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
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


//Темы
Route::get('/', [ThemeController::class, 'index'])->name('test')->middleware('auth');
Route::resource('themes', ThemeController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

//Статьи
Route::get('/articles/create/{themeId}', [ArticleController::class, 'create'])->name('articles.create');
Route::resource('articles', ArticleController::class)->except([
    'create', 'index'
]);

//Пользователи
Route::post('/users/activate/{user}', [UserController::class, 'activate'])->name('users.activate');
Route::resource('users', UserController::class);


require __DIR__ . '/auth.php';
