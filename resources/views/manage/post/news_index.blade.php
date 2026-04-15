<x-manage-layout>
    <x-slot:title>ニュース一覧</x-slot:title>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">記事選択</h2>
        <a href="{{ route('manage.post.news.edit') }}" class="bg-green-600 text-white px-4 py-2 rounded">＋ 新規作成</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">タイトル</th>
                    <th class="p-4">日付</th>
                    <th class="p-4">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newsList as $news)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4">{{ $news['id'] }}</td>
                    <td class="p-4">{{ $news['title'] }}</td>
                    <td class="p-4 text-sm">{{ $news['date'] }}</td>
                    <td class="p-4">
                        <a href="{{ route('manage.post.news.edit', $news['id']) }}" class="text-blue-600">編集</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-manage-layout>