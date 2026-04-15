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

        // --- ニュース管理 ---
        // 一覧表示
        Route::get('/news', [PostController::class, 'newsIndex'])->name('news.index');
        // 編集・新規作成画面（idは任意なので ? をつける）
        Route::get('/news/edit/{id?}', [PostController::class, 'newsEdit'])->name('news.edit');
        // 保存処理
        Route::post('/news/store', [PostController::class, 'newsStore'])->name('news.store');

        // --- その他（これらも今後コントローラー化していくと良いです） ---
        Route::get('/organization', function () {
            return view('manage.post.organization');
        })->name('organization');

        Route::get('/blog', function () {
            return view('manage.post.blog');
        })->name('blog');
    });
});
