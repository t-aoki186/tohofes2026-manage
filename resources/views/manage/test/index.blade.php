<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>


    <form action="" method="POST">

        <input type="hidden" name="old_id" value="">
        <input type="hidden" name="type" value="organization">
        <input type="hidden" name="heading" value="">

        <!---->
        <!--s:タイトル/記事ID-->
        <div class="flex gap-2">
            <input type="text" name="id" value="" class="bg-[#2c2d30] text-white border border-gray-600 rounded-xl p-3" placeholder="記事ID: [例:1]">
            <input type="text" name="title" value="" class="w-full bg-[#2c2d30] text-white placeholder:text-gray-500 border border-gray-500 rounded-xl p-4 text-xl" placeholder="タイトルを入力...">
        </div>
        <!--e:タイトル/記事ID-->
        <!---->
        <!--s:アコーディオン-->
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
            <div id="editPane" class="pane active">
                <textarea name="body" id="markdown-input" class="flex-1 p-5 bg-[#2c2d30] rounded-xl border border-gray-500 text-white placeholder:text-gray-500 font-mono resize-none focus:outline-none focus:border-blue-500" placeholder="Markdownで本文を入力..."></textarea>
            </div>
            <!-- プレビュー面 -->
            <div id="previewPane" class="pane">
                <div id="preview" class="flex-1 p-5 bg-[#2c2d30] dash-md-preview rounded-xl text-white border border-gray-500 overflow-y-auto prose prose-invert max-w-none">
                </div>
            </div>
        </div>

        <!---->
        <!--s:下部ボタン-->
        <div class="mt-6 flex justify-between items-center">
            <a href="" class="text-gray-400 hover:text-white transition">← 一覧に戻る</a>
            <button type="submit" class="bg-gray-600 text-white px-8 py-3 rounded-lg font-bold cursor-pointer hover:bg-gray-700 transition shadow-lg">
                JSONを更新して公開
            </button>
        </div>
        <!--e:下部ボタン-->
    </form>

    <style>
        .editor-container {
            display: flex;
            position: relative;
        }

        .pane {
            flex: 1;
            box-sizing: border-box;
            padding: 15px;
        }

        /* 編集エリア */
        #markdown-input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            resize: none;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* プレビューエリア */
        #preview {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        /* モバイル表示のスタイル (767px以下) */
        @media (max-width: 1500px) {
            .toggle-btn {
                display: block;
            }

            .pane {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: none;
                /* 基本は非表示 */
                background: white;
                padding: 0 !important;
            }

            /* activeクラスがついている方だけ表示 */
            .pane.active {
                display: block;
            }

            #preview {
                border-left: none;
            }

            .toggle-switch {
                display: block !important;
                position: relative;
                display: inline-block;
                width: 80px;
                height: 40px;
                cursor: pointer;
            }
        }

        /**/

        .toggle-switch {
            display: none;
        }

        .toggle-switch input[type="checkbox"] {
            display: none;
        }

        .toggle-switch-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ddd;
            border-radius: 20px;
            box-shadow: inset 0 0 0 2px #ccc;
            transition: background-color 0.3s ease-in-out;
        }

        .toggle-switch-handle {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 30px;
            height: 30px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .toggle-switch::before {
            content: "";
            position: absolute;
            top: -25px;
            right: -35px;
            font-size: 12px;
            font-weight: bold;
            color: #aaa;
            text-shadow: 1px 1px #fff;
            transition: color 0.3s ease-in-out;
        }

        .toggle-switch input[type="checkbox"]:checked+.toggle-switch-handle {
            transform: translateX(45px);
            box-shadow:
                0 2px 5px rgba(0, 0, 0, 0.2),
                0 0 0 3px #05c46b;
        }

        .toggle-switch input[type="checkbox"]:checked+.toggle-switch-background {
            background-color: #05c46b;
            box-shadow: inset 0 0 0 2px #04b360;
        }

        .toggle-switch input[type="checkbox"]:checked+.toggle-switch:before {
            content: "On";
            color: #05c46b;
            right: -15px;
        }

        .toggle-switch input[type="checkbox"]:checked+.toggle-switch-background .toggle-switch-handle {
            transform: translateX(40px);
        }
    </style>
    <script>
        const editor = document.getElementById('markdown-input');
        const preview = document.getElementById('preview');
        const toggleBtn = document.getElementById('toggleBtn');
        const editPane = document.getElementById('editPane');
        const previewPane = document.getElementById('previewPane');

        // 入力に合わせてプレビューを更新
        editor.addEventListener('input', () => {
            preview.innerHTML = marked.parse(editor.value);
        });

        // モバイル用切り替えロジック
        toggleBtn.addEventListener('click', () => {
            const isEditing = editPane.classList.contains('active');

            if (isEditing) {
                editPane.classList.remove('active');
                previewPane.classList.add('active');
            } else {
                editPane.classList.add('active');
                previewPane.classList.remove('active');
            }
        });
    </script>

</x-manage-layout>