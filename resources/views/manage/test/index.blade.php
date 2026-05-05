<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>


    <form action="" method="POST">

        <input type="hidden" name="old_id" value="">
        <input type="hidden" name="type" value="organization">
        <input type="hidden" name="heading" value="">

        <div class="flex gap-2">
            <input type="text" name="id" value="" class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3" placeholder="記事ID: [例:1]">
            <input type="text" name="title" value="" class="w-full bg-[#2c2d30] text-white placeholder:text-gray-500 border border-gray-500 rounded-xl p-4 text-xl" placeholder="タイトルを入力...">
        </div>
        <br>
        <div>
            <details class="accordion-main mb-4 min-w-full">
                <summary class="font-bold">ご案内</summary>

                <div class="flex flex-col gap-1 mt-4">
                    <label class="text-gray-400 text-xs ml-2">サムネイルURL</label>
                    <input type="text" name="thumbnail" value="" class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3">
                </div>

                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-xs ml-2">カテゴリー</label>
                        <input type="text" name="category" value=""
                            class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3"
                            placeholder="例: グッズ販売, 展示">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-xs ml-2">場所（ブース番号など）</label>
                        <input type="text" name="location" value=""
                            class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3"
                            placeholder="3-G">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="text-gray-400 text-xs ml-2">開催日 (例: 1, 2)</label>
                    <input type="text" name="orgDate" value="" class="w-full bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3" placeholder="1, 2">
                </div>

                <div class="mb-6 bg-[#1e1f22] p-4 rounded-xl border border-gray-700">
                    <label class="text-gray-400 text-sm font-bold block mb-3">タイムテーブル設定</label>
                    <div id="schedule-container" class="space-y-3">
                        <div class="flex gap-2 schedule-row">
                            <input type="text" name="" value="" placeholder="日" class="w-16 bg-[#2c2d30] text-white border border-gray-600 rounded-lg p-2 text-center">
                            <input type="text" name="" value="" placeholder="10:30 ~ 11:30" class="flex-1 bg-[#2c2d30] text-white border border-gray-600 rounded-lg p-2">
                            <button type="button" onclick="this.parentElement.remove()" class="cursor-pointer px-2"><i class="fa-solid fa-x text-red-500"></i></button>
                        </div>
                    </div>
                    <button type="button" id="add-schedule" class="mt-3 text-sm bg-gray-700 text-white px-4 py-1 rounded-lg hover:bg-gray-600 transition cursor-pointer">
                        <i class="fa-solid fa-circle-plus mr-2"></i>予定を追加
                    </button>
                </div>
            </details>
        </div>
        <br>

        <div class="grid grid-cols-2 gap-4 h-150">
            <div class="flex flex-col">
                <textarea name="body" id="markdown-input" class="flex-1 p-5 bg-[#2c2d30] rounded-xl border border-gray-500 text-white placeholder:text-gray-500 font-mono resize-none focus:outline-none focus:border-blue-500" placeholder="Markdownで本文を入力..."></textarea>
            </div>
            <div class="flex flex-col">
                <div id="preview" class="flex-1 p-5 bg-[#2c2d30] dash-md-preview rounded-xl text-white border border-gray-500 overflow-y-auto prose prose-invert max-w-none">
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-between items-center">
            <a href="" class="text-gray-400 hover:text-white transition">← 一覧に戻る</a>
            <button type="submit" class="bg-gray-600 text-white px-8 py-3 rounded-lg font-bold cursor-pointer hover:bg-gray-700 transition shadow-lg">
                JSONを更新して公開
            </button>
        </div>
    </form>

</x-manage-layout>