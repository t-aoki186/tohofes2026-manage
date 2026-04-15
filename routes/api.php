<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/json/news.json', function () {
    if (!Storage::disk('public')->exists('json/news.json')) {
        return response()->json(['message' => 'File not found'], 404);
    }

    // ファイルを読み込んでJSONとして返す
    $json = Storage::disk('public')->get('json/news.json');
    return response($json, 200)->header('Content-Type', 'application/json');
});
