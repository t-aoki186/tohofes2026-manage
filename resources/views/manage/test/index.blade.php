<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>


    <form action="" method="POST" class="flex flex-col gap-4 edit-form">

        <input type="hidden" name="old_id" value="">
        <input type="hidden" name="type" value="organization">
        <input type="hidden" name="heading" value="">

        <!---->
        <!--s:タイトル/記事ID-->
        <div class="flex gap-2">
            <input type="text" name="id" value="" class="bg-[#2c2d30] text-white rounded-xl p-3 placeholder:text-(--main-text-color) placeholder:text-sm" placeholder="記事ID: [例:1]">
            <input type="text" name="title" value="" class="w-full bg-[#2c2d30] text-white placeholder:text-(--main-text-color) placeholder:text-sm rounded-xl p-4 text-xl" placeholder="タイトルを入力...">
        </div>
        <!--e:タイトル/記事ID-->
        <!---->
        <!--s:アコーディオン-->
        <br>
        <div class="flex flex-col">
            <details class="accordion-main mb-4 min-w-full border border-[#2c2d30] p-4 rounded-xl">
                <summary class="font-bold text-(--main-text-color)">詳細設定(必須)</summary>
                <br>
                <div class="flex flex-col gap-1">
                    <label class="text-gray-400 text-xs ml-2 mt-4">サムネイルURL</label>
                    <input type="text" name="thumbnail" value="" class="bg-[#2c2d30] text-white rounded-xl p-3">
                </div>

                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-xs ml-2">カテゴリー</label>
                        <input type="text" name="category" value=""
                            class="bg-[#2c2d30] text-white rounded-xl p-3"
                            placeholder="例: グッズ販売, 展示">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-xs ml-2">場所（ブース番号など）</label>
                        <input type="text" name="location" value=""
                            class="bg-[#2c2d30] text-white rounded-xl p-3"
                            placeholder="例: 3-G">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="text-gray-400 text-xs ml-2">開催日</label>
                    <input type="text" name="orgDate" value="" class="w-full bg-[#2c2d30] text-white rounded-xl p-3" placeholder="例: 1, 2">
                </div>
                <!---->
                <!--s:タイムテーブル-->
                <hr class="main-hr">
                <div class="mb-6">
                    <label class="text-gray-400 text-xs ml-2">開催日</label>
                    <div id="schedule-container" class="space-y-3">
                        <div class="flex gap-2 schedule-row">
                            <input type="text" name="" value="" placeholder="日" class="w-16 bg-[#2c2d30] text-white rounded-lg p-2 text-center">
                            <input type="text" name="" value="" placeholder="10:30 ~ 11:30" class="flex-1 bg-[#2c2d30] text-white rounded-lg p-2">
                            <button type="button" onclick="this.parentElement.remove()" class="cursor-pointer px-2 mt-4"><i class="fa-solid fa-xmark text-red-500"></i></button>
                        </div>
                    </div>
                    <button type="button" id="add-schedule" class="mt-3 follow-btn">
                        <i class="fa-solid fa-circle-plus mr-2"></i>予定を追加
                    </button>
                </div>
                <!--e:タイムテーブル-->
            </details>
        </div>
        <br>
        <!--e:アコーディオン-->
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
        <div class="editor-container h-150">
            <!-- 編集面 -->
            <div id="editPane" class="edit-pane active">
                <textarea name="body" id="markdown-input" class="flex-1 p-5 bg-[#2c2d30] rounded-xl text-white placeholder:text-gray-500 font-mono resize-none focus:outline-none" placeholder="Markdownで本文を入力..."></textarea>
            </div>
            <!-- プレビュー面 -->
            <div id="previewPane" class="edit-pane">
                <div id="preview" class="flex-1 p-5 bg-[#2c2d30] dash-md-preview rounded-xl text-white overflow-y-auto prose prose-invert max-w-none">
                </div>
            </div>
        </div>

        <!---->
        <!--s:下部ボタン-->
        <div class="mt-6 flex justify-between items-center">
            <a href="" class="follow-btn">← 一覧に戻る</a>
            <button type="submit" class="follow-btn">
                JSONを更新して公開
            </button>
        </div>
        <br>
        <!--e:下部ボタン-->
    </form>

</x-manage-layout>