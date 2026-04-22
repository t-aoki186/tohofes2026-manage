<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // --- 共通ロジック ---

    private function getJsonData($filename)
    {
        $path = "json/{$filename}.json";
        if (!Storage::disk('public')->exists($path)) return [];
        return json_decode(Storage::disk('public')->get($path), true) ?: [];
    }

    /*s:共通メソット*/
    private function saveJsonData($filename, $request)
    {
        $list = $this->getJsonData($filename);
        //
        //基本項目(お知らせ/ブログ/参加団体共通
        $baseData = $request->only(['id', 'title', 'heading', 'body', 'thumbnail', 'type', 'date']);
        //
        //参加団体専用の項目
        if ($filename === 'organization') {
            $extraData = $request->only(['category', 'location', 'twitter_id', 'schedule']);
            $newData = array_merge($baseData, $extraData);
        } else {
            $newData = $baseData;
        }
        //
        //更新/新規作成判定
        // old_id が送信されている、かつ一覧の中にそのIDが存在する場合は「編集」
        $isEdit = $request->filled('old_id') && collect($list)->contains('id', $request->old_id);

        if ($isEdit) {
            // 編集処理
            $list = array_map(fn($item) => $item['id'] == $request->old_id ? $newData : $item, $list);
        } else {
            // 新規作成処理
            // 入力されたIDが空ならタイムスタンプで生成
            if (empty($newData['id'])) {
                $newData['id'] = (string)time();
            }

            // 念のため、既存のIDと被っていないかチェック（被っていたら上書きせず追加）
            $list[] = $newData;
        }

        Storage::disk('public')->put("json/{$filename}.json", json_encode($list, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }


    private function defaultData($type)
    {
        return [
            'id' => '',
            'title' => '',
            'heading' => '',
            'body' => '',
            'thumbnail' => 'https://pic.atserver186.jp/img/tohofes/dev-test/sample-img/news-v4.webp',
            'type' => $type,
            'date' => now()->toIso8601String(),
            'category' => '',
            'location' => '',
            'orgDate' => '',
            'schedule' => []
        ];
    }

    // --- News (ニュース) ---

    public function newsIndex()
    {
        return view('manage.post.news_index', ['newsList' => $this->getJsonData('news')]);
    }

    public function newsEdit($id = null)
    {
        $target = collect($this->getJsonData('news'))->firstWhere('id', $id) ?: $this->defaultData('news');
        return view('manage.post.news_edit', compact('target', 'id'));
    }

    public function newsStore(Request $request)
    {
        $this->saveJsonData('news', $request);
        return redirect()->route('manage.post.news.index')->with('status', '更新しました');
    }

    // --- Blog (ブログ) ---

    public function blogIndex()
    {
        return view('manage.post.blog_index', ['newsList' => $this->getJsonData('blog')]);
    }

    public function blogEdit($id = null)
    {
        $target = collect($this->getJsonData('blog'))->firstWhere('id', $id) ?: $this->defaultData('blog');
        return view('manage.post.blog_edit', compact('target', 'id'));
    }

    public function blogStore(Request $request)
    {
        $this->saveJsonData('blog', $request);
        return redirect()->route('manage.post.blog.index');
    }

    // --- Organization (参加団体) ---

    // 参加団体 (Organization)
    public function orgIndex()
    {
        return view('manage.post.org_index', ['newsList' => $this->getJsonData('organization')]);
    }
    public function orgEdit($id = null)
    {
        $target = collect($this->getJsonData('organization'))->firstWhere('id', $id) ?: $this->defaultData('organization');
        return view('manage.post.org_edit', compact('target', 'id'));
    }
    public function orgStore(Request $request)
    {
        $this->saveJsonData('organization', $request);
        return redirect()->route('manage.post.organization.index')->with('status', '団体情報を更新しました');
    }
}
