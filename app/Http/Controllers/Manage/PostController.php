<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $jsonPath = 'json/news.json';

    // JSONを配列として取得する共通メソッド
    private function getNewsData()
    {
        if (!Storage::disk('public')->exists($this->jsonPath)) return [];
        return json_decode(Storage::disk('public')->get($this->jsonPath), true) ?: [];
    }

    // Page A: 記事一覧
    public function newsIndex()
    {
        $newsList = $this->getNewsData();
        return view('manage.post.news_index', compact('newsList'));
    }

    // Page B: 編集・新規作成画面
    public function newsEdit($id = null)
    {
        $newsList = $this->getNewsData();
        // IDに一致する記事を探す。なければ新規作成用の空配列
        $target = collect($newsList)->firstWhere('id', $id) ?: [
            'id' => '',
            'title' => '',
            'heading' => '',
            'body' => '',
            'thumbnail' => 'https://pic.atserver186.jp/img/tohofes/dev-test/sample-img/news-v4.webp',
            'type' => 'news',
            'date' => now()->toIso8601String()
        ];

        return view('manage.post.news_edit', compact('target', 'id'));
    }

    // 保存処理
    public function newsStore(Request $request)
    {
        $newsList = $this->getNewsData();
        $newData = $request->only(['id', 'title', 'heading', 'body', 'thumbnail', 'type', 'date']);

        if ($request->filled('old_id')) {
            // 編集：既存のIDを探して差し替える
            $newsList = array_map(fn($item) => $item['id'] == $request->old_id ? $newData : $item, $newsList);
        } else {
            // 新規作成：IDを自動生成して追加（簡易的に現在時刻など）
            if (empty($newData['id'])) $newData['id'] = (string)time();
            $newsList[] = $newData;
        }

        Storage::disk('public')->put($this->jsonPath, json_encode($newsList, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return redirect()->route('manage.post.news.index')->with('status', '保存しました');
    }
}
