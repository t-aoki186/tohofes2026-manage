<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>

    <form method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4 h-150">
            {{-- 編集エリア --}}
            <div class="flex flex-col">
                <label class="font-bold mb-2">Markdown入力</label>
                <textarea
                    name="content"
                    id="markdown-input"
                    class="flex-1 p-4 border rounded-lg font-mono text-sm focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="# タイトルを入力..."></textarea>
            </div>

            {{-- プレビューエリア --}}
            <div class="flex flex-col">
                <label class="font-bold mb-2">プレビュー</label>
                <div
                    id="preview"
                    class="flex-1 p-4 border rounded-lg bg-white overflow-y-auto prose prose-blue max-w-none">
                    {{-- ここに変換後のHTMLが入る --}}
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700">
                JSONとして保存・公開
            </button>
        </div>
    </form>
</x-manage-layout>