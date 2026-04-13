<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// prefix('manage') と name('manage.') のグループの中にすべて入れます
Route::prefix('manage')->name('manage.')->group(function () {

    // これで URL: /manage , 名前: manage.index になります
    Route::get('/', function () {
        return view('manage.index');
    })->name('index');

    // お問い合わせ確認 (URL: /manage/inquiry , 名前: manage.inquiry)
    Route::get('/inquiry', function () {
        return view('manage.inquiry.index');
    })->name('inquiry');

    // 投稿系 (post) のグループ
    Route::prefix('post')->name('post.')->group(function () {
        // 名前は manage.post.news になります
        Route::get('/news', function () {
            return view('manage.post.news');
        })->name('news');

        Route::get('/organization', function () {
            return view('manage.post.organization');
        })->name('organization');

        Route::get('/blog', function () {
            return view('manage.post.blog');
        })->name('blog');
    });
});
