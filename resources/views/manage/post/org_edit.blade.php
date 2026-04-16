<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>

    <div class="pt-25 ml-5 mr-5 h-screen">
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