<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ArticleCategoryController,
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'loginView'])->name('loginView');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('management')->group(function () {
        Route::prefix('article')->group(function () {
            Route::get('/list', [ArticleController::class, 'list'])->name('articleList');
            Route::post('/create', [ArticleController::class, 'create'])->name('articleCreate');
            Route::post('/upload-image', [ArticleController::class, 'uploadImage'])->name('articleUploadImage');
            Route::put('/update/{article}', [ArticleController::class, 'update'])->name('articleUpdate');
            Route::delete('/delete/{article}', [ArticleController::class, 'delete'])->name('articleDelete');
        });

        Route::prefix('article-category')->group(function () {
            Route::get('/list', [ArticleCategoryController::class, 'list'])->name('articleCategoryList');
            Route::post('/create', [ArticleCategoryController::class, 'create'])->name('articleCategoryCreate');
            Route::put('/update/{articleCategory}', [ArticleCategoryController::class, 'update'])->name('articleCategoryUpdate');
            Route::delete('/delete/{articleCategory}', [ArticleCategoryController::class, 'delete'])->name('articleCategoryDelete');
        });

        Route::middleware(['admin'])->group(function () {

        });
    });
});
