<x-manage-layout>
    <x-slot:title>ニュース投稿</x-slot:title>
    <x-slot:pageTitle>ニュースをMarkdownで書く</x-slot:pageTitle>

    <div class="ml-5 mr-5 h-screen">
        <form method="POST">
            <!--s:タイトル入力-->
            <div class="mb-4">
                <input type="text" class="w-full bg-[#2c2d30] text-white placeholder:text-gray-500 border border-gray-500 rounded-xl p-4 text-xl" placeholder="タイトルを入力...">
            </div>
            <!--e:タイトル入力-->
            <!---->
            <!--s:本文入力/プレビュー-->
            <div class="grid grid-cols-2 gap-4 min-h-150">
                <!--s:入力フォーム-->
                <div class="flex flex-col">
                    <textarea name="content" id="markdown-input" class="flex-1 p-5 bg-[#2c2d30] rounded-xl border-gray-500 text-white placeholder:text-gray-500" placeholder="Markwondで本文を入力..."></textarea>
                </div>
                <!--e:入力フォーム-->
                <!---->
                <!--s:プレビュー-->
                <div class="flex flex-col">
                    <div id="preview" class="flex-1 p-5 bg-[#2c2d30] dash-md-preview rounded-xl text-white">
                    </div>
                </div>
                <!--e:プレビュー-->
            </div>
            <!--e:本文入力/プレビュー-->
        </form>
    </div>
</x-manage-layout>