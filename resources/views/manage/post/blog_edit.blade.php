<x-manage-layout>
    <x-slot:title>ブログ投稿</x-slot:title>
    <x-slot:pageTitle>ブログをMarkdownで書く</x-slot:pageTitle>


    <form action="{{ route('manage.post.blog.store') }}" method="POST" class="flex flex-col gap-4 edit-form">
        @csrf
        {{-- 編集時は元のIDを保持、新規時は空 --}}
        <input type="hidden" name="old_id" value="{{ $id }}">

        {{-- 固定値（必要に応じて変更可能にする） --}}
        <input type="hidden" name="type" value="blog">
        <input type="hidden" name="heading" value="">

        <!---->
        <!--s:タイトル/記事ID-->
        <div class="editp-top">
            <input type="text" name="id" value="{{ $target['id'] }}" class="bg-[#2c2d30] text-white rounded-xl p-3 placeholder:text-(--main-text-color) placeholder:text-sm" placeholder="記事ID: [例:1]">
            <input type="text" name="title" value="{{ $target['title'] }}" class="w-full bg-[#2c2d30] text-white placeholder:text-(--main-text-color) placeholder:text-sm rounded-xl p-4 text-xl" placeholder="タイトルを入力...">
        </div>
        <!--e:タイトル/記事ID-->
        <!---->
        <!--s:アコーディオン-->
        <div class="flex flex-col">
            <details class="accordion-main mb-4 min-w-full border border-[#2c2d30] p-4 rounded-xl">
                <summary class="font-bold text-(--main-text-color)">詳細設定(必須)</summary>
                <br>
                <div class="flex flex-col gap-1">
                    <label class="text-gray-400 text-xs ml-2 mt-4">サムネイルURL</label>
                    <input type="text" name="thumbnail" value="{{ $target['thumbnail'] }}" class="bg-[#2c2d30] text-white rounded-xl p-3">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-gray-400 text-xs ml-2 mt-4">投稿日時</label>
                    <input type="datetime-local" name="published_at" value="{{ $target['published_at'] }}" class="bg-[#2c2d30] text-white rounded-xl p-3">
                </div>
            </details>
        </div>
        <!---->
        <!--s:エディター,プレビュー切り替え-->
        <label class="toggle-switch">
            <input type="checkbox" id="toggleBtn" />
            <div class="toggle-switch-background">
                <div class="toggle-switch-handle"></div>
            </div>
        </label>
        <!--e:エディター,プレビュー切り替え-->
        <!---->
        <!--s: エディター/プレビュー-->
        <div class="editor-container h-150">
            <!-- 編集面 -->
            <div id="editPane" class="edit-pane active">
                <textarea name="body" id="markdown-input" class="flex-1 p-5 bg-[#2c2d30] rounded-xl text-white placeholder:text-gray-500 font-mono resize-none focus:outline-none" placeholder="Markdownで本文を入力...">{{ $target['body'] }}</textarea>
            </div>
            <!-- プレビュー面 -->
            <div id="previewPane" class="edit-pane">
                <div id="preview" class="flex-1 p-5 bg-[#2c2d30] dash-md-preview rounded-xl text-white overflow-y-auto prose prose-invert max-w-none">
                </div>
            </div>
        </div>
        <!--e: エディター/プレビュー-->
        <!---->
        <!--s:下部ボタン-->
        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('manage.post.blog.index') }}" class="follow-btn">← 一覧に戻る</a>
            <button type="submit" class="follow-btn">
                JSONを更新して公開
            </button>
        </div>
        <br>
        <!--e:下部ボタン-->
    </form>

</x-manage-layout>