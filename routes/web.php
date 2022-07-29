<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ArticleController,
    AuthController
};

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

Route::get('/', [AuthController::class, 'loginView'])->name('loginView');
Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('management')->group(function () {
        Route::prefix('article')->group(function () {
            Route::get('/list', [ArticleController::class, 'list'])->name('articleList');
            Route::get('/add', [ArticleController::class, 'add'])->name('articleAdd');
        });

        Route::middleware(['admin'])->group(function () {

        });
    });
});
