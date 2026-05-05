<?php

use Illuminate\Support\Facades\Route;
// コントローラーをインポート
use App\Http\Controllers\Manage\PostController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('manage')->name('manage.')->group(function () {

    Route::get('/', function () {
        return view('manage.index');
    })->name('index');

    // お問い合わせ確認
    Route::get('/inquiry', function () {
        return view('manage.inquiry.index');
    })->name('inquiry');

    // 投稿系 (post) のグループ
    Route::prefix('post')->name('post.')->group(function () {
        // ニュース (既存)
        Route::get('/news', [PostController::class, 'newsIndex'])->name('news.index');
        Route::get('/news/edit/{id?}', [PostController::class, 'newsEdit'])->name('news.edit');
        Route::post('/news/store', [PostController::class, 'newsStore'])->name('news.store');

        // ブログ
        Route::get('/blog', [PostController::class, 'blogIndex'])->name('blog.index');
        Route::get('/blog/edit/{id?}', [PostController::class, 'blogEdit'])->name('blog.edit');
        Route::post('/blog/store', [PostController::class, 'blogStore'])->name('blog.store');

        // 参加団体説明
        Route::get('/organization', [PostController::class, 'orgIndex'])->name('organization.index');
        Route::get('/organization/edit/{id?}', [PostController::class, 'orgEdit'])->name('organization.edit');
        Route::post('/organization/store', [PostController::class, 'orgStore'])->name('organization.store');
    });

    //test
    Route::any('/test', function () {
        return view('manage.test.index');
    })->name('test');
});
