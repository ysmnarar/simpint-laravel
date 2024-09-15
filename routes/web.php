<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Ini Akses Tamu = ga usah login bisa liat landing page
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('front.index');
    Route::get('/detail/{id}', 'detail')->name('admin.index.detail');
    Route::post('/like/{id}', 'toggleLike')->name('toggle.likes');
    Route::get('/sidebar/login', 'sidebarLogin')->name('sidebar.login');
    Route::get('/profile', 'showProfile')->name('show.profile');
    Route::get('/profile/edit', 'editProfile')->name('edit.profile');
    Route::post('/profile/update', 'updateProfile')->name('update.profile');
    Route::post('/profile/upload', 'uploadAvatar')->name('upload.profile')->middleware('auth');
    Route::get('/categories', 'categories')->name('show.categories');
    Route::get('/breadcrumbs', 'breadcrumbs')->name('show.breadcrumbs');
    Route::post('/search', 'searchBook');

    // filter category
    Route::get('/categories/romance', 'Romance');
    Route::get('/categories/horror', 'Horror');
    Route::get('/categories/mystery', 'Mystery');
    Route::get('/categories/fantasy', 'Fantasy');
    Route::get('/categories/teen-fiction', 'TeenFiction');
    Route::get('/categories/adventure', 'Adventure');
});

Route::controller(LikeController::class)->group(function () {
    Route::get('/likes', 'likes')->name('index.likes');
    Route::get('/product/likes', 'productLikes')->name('product.likes');
    Route::post('/product/likes/{id}', 'removeLike')->name('product.removeLike');
});

Route::prefix('admin')->group(function () {
    Route::controller(BaseController::class)->group(function () {
        Route::get('/home', 'Index')->name('index.home');
        Route::get('/data/user', 'User')->name('index.user');
        Route::delete('/user/delete', 'deleteUser')->name('admin.delete.user');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'category')->name('index.category');
        Route::get('/form/category', 'formCategory')->name('admin.form.category');
        Route::post('/add/category', 'addCategory')->name('admin.add.category');
        Route::get('/category/edit/{id}', 'editCategory')->name('admin.edit.category');
        Route::put('/category/update/{id}', 'updateCategory')->name('admin.update.category');
        Route::delete('/category/delete', 'deleteCategory')->name('admin.delete.category');

        // // Fitur Search
        Route::get('/category-search', 'searchCategory')->name('category.search');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'product')->name('admin.index.product');
        Route::get('/product/form', 'formProduct')->name('admin.form.product');
        Route::post('/add/product', 'addProduct')->name('admin.add.product');
        Route::get('/desc/product', 'descProduct')->name('admin.desc.product');
        Route::get('/product/edit/{id}', 'editProduct')->name('admin.edit.product');
        Route::put('/product/update/{id}', 'updateProduct')->name('admin.update.product');
        Route::delete('/product/delete', 'deleteProduct')->name('admin.delete.product');

            // Buat filter data product berdasarkan category
            Route::get('/book/romance', 'Romance')->name('book.romance');
            Route::get('/book/horror', 'Horror')->name('book.horror');
            Route::get('/book/mystery', 'Mystery')->name('book.mystery');
            Route::get('/book/fantasy', 'Fantasy')->name('book.fantasy');
            Route::get('/book/teen-fiction', 'TeenFiction')->name('book.teen.fiction');
            Route::get('/book/adventure', 'Adventure')->name('book.adventure');

            // Fitur Search
            Route::get('/product-search', 'searchProduct')->name('product.search');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
