<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>

    <div class="pt-25 ml-5 mr-5 h-screen min-w-full">
        <form action="{{ route('manage.post.organization.store') }}" method="POST">
            @csrf
            {{-- 編集時は元のIDを保持、新規時は空 --}}
            <input type="hidden" name="old_id" value="{{ $id }}">

            {{-- 固定値（必要に応じて変更可能にする） --}}
            <input type="hidden" name="type" value="organization">
            <input type="hidden" name="heading" value="">

            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex flex-col gap-1">
                    <label class="text-gray-400 text-xs ml-2">記事ID</label>
                    <input type="text" name="id" value="{{ $target['id'] }}" class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3" placeholder="例: 1">
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-gray-400 text-xs ml-2">サムネイルURL</label>
                    <input type="text" name="thumbnail" value="{{ $target['thumbnail'] }}" class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3">
                </div>

                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-xs ml-2">カテゴリー</label>
                        <input type="text" name="category" value="{{ $target['category'] ?? '' }}"
                            class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3"
                            placeholder="例: グッズ販売, 展示">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-xs ml-2">場所（ブース番号など）</label>
                        <input type="text" name="location" value="{{ $target['location'] ?? '' }}"
                            class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3"
                            placeholder="3-G">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="text-gray-400 text-xs ml-2">開催日 (例: 1, 2)</label>
                    <input type="text" name="orgDate" value="{{ $target['orgDate'] ?? '' }}" class="w-full bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3" placeholder="1, 2">
                </div>

                <div class="mb-6 bg-[#1e1f22] p-4 rounded-xl border border-gray-700">
                    <label class="text-gray-400 text-sm font-bold block mb-3">タイムテーブル設定</label>
                    <div id="schedule-container" class="space-y-3">
                        @foreach($target['schedule'] ?? [] as $index => $sch)
                        <div class="flex gap-2 schedule-row">
                            <input type="text" name="schedule[{{ $index }}][day]" value="{{ $sch['day'] }}" placeholder="日" class="w-16 bg-[#2c2d30] text-white border border-gray-600 rounded-lg p-2 text-center">
                            <input type="text" name="schedule[{{ $index }}][time]" value="{{ $sch['time'] }}" placeholder="10:30 ~ 11:30" class="flex-1 bg-[#2c2d30] text-white border border-gray-600 rounded-lg p-2">
                            <button type="button" onclick="this.parentElement.remove()" class="text-red-500 px-2">✕</button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-schedule" class="mt-3 text-sm bg-gray-700 text-white px-4 py-1 rounded-lg hover:bg-gray-600 transition">
                        ＋ 予定を追加
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <input type="text" name="title" value="{{ $target['title'] }}" class="w-full bg-[#2c2d30] text-white placeholder:text-gray-500 border border-gray-500 rounded-xl p-4 text-xl" placeholder="タイトルを入力...">
            </div>
            <div class="grid grid-cols-2 gap-4 h-150">
                <div class="flex flex-col">
                    <textarea name="body" id="markdown-input" class="flex-1 p-5 bg-[#2c2d30] rounded-xl border border-gray-500 text-white placeholder:text-gray-500 font-mono resize-none focus:outline-none focus:border-blue-500" placeholder="Markdownで本文を入力...">{{ $target['body'] }}</textarea>
                </div>
                <div class="flex flex-col">
                    <div id="preview" class="flex-1 p-5 bg-[#2c2d30] dash-md-preview rounded-xl text-white border border-gray-500 overflow-y-auto prose prose-invert max-w-none">
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('manage.post.organization.index') }}" class="text-gray-400 hover:text-white transition">← 一覧に戻る</a>
                <button type="submit" class="bg-gray-600 text-white px-8 py-3 rounded-lg font-bold cursor-pointer hover:bg-gray-700 transition shadow-lg">
                    JSONを更新して公開
                </button>
            </div>
        </form>
    </div>
</x-manage-layout>