<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ArticleCategoryController,
    ArticleController,
    AuthController,
    BlogCategoryController,
    BlogController,
    UserController
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

        Route::prefix('blog')->group(function () {
            Route::get('/list', [BlogController::class, 'list'])->name('blogList');
            Route::get('/new', [BlogController::class, 'new'])->name('blogNew');
            Route::get('/edit/{blog}', [BlogController::class, 'edit'])->name('blogEdit');
            Route::get('/detail/{blog}', [BlogController::class, 'detail'])->name('blogDetail');
            Route::post('/create', [BlogController::class, 'create'])->name('blogCreate');
            Route::post('/upload-image', [BlogController::class, 'uploadImage'])->name('blogUploadImage');
            Route::put('/update/{blog}', [BlogController::class, 'update'])->name('blogUpdate');
            Route::delete('/delete/{blog}', [BlogController::class, 'delete'])->name('blogDelete');
        });

        Route::prefix('blog-category')->group(function () {
            Route::get('/list', [BlogCategoryController::class, 'list'])->name('blogCategoryList');
            Route::post('/create', [BlogCategoryController::class, 'create'])->name('blogCategoryCreate');
            Route::put('/update/{blogCategory}', [BlogCategoryController::class, 'update'])->name('blogCategoryUpdate');
            Route::delete('/delete/{blogCategory}', [BlogCategoryController::class, 'delete'])->name('blogCategoryDelete');
        });

        Route::middleware(['admin'])->group(function () {
            Route::prefix('user')->group(function () {
                Route::get('/list', [UserController::class, 'list'])->name('userList');
                Route::post('/create', [UserController::class, 'create'])->name('userCreate');
                Route::put('/update/{user}', [UserController::class, 'update'])->name('userUpdate');
                Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('userDelete');
            });
        });
    });
});
