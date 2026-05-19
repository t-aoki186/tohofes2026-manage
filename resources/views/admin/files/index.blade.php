<x-manage-layout>
    <x-slot:title>ファイル管理</x-slot:title>
    <x-slot:pageTitle>ファイル一覧</x-slot:pageTitle>
    <div class="container">
        <div class="card">
            <div class="mt-4">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <a href="{{ route('admin.files.create') }}" class="follow-btn">ファイルをアップロード</a>
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th class="text-white">ID</th>
                            <th class="text-white">ファイル名</th>
                            <th class="text-white">サイズ</th>
                            <th class="text-white">公開URL</th>
                            <th class="text-white">アップロード日</th>
                            <th class="text-white">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td class="text-white">{{ $file->id }}</td>
                            <td class="text-white">{{ $file->original_name }}</td>
                            <td class="text-white">{{ number_format($file->size / 1024, 2) }} KB</td>
                            <td class="text-white">
                                <input type="text" class="w-[80%] bg-[#2c2d30] text-white border border-gray-600 focus:outline-none" value="{{ $file->url }}" onclick="this.select()" readonly>
                            </td>
                            <td class="text-white">{{ $file->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.files.destroy', $file->id) }}" method="POST" onsubmit="return confirm('削除しますか？')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm cancel-btn" style="padding: 2px 4px !important; font-size: 0.7rem;"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $files->links() }}
            </div>
        </div>
    </div>
</x-manage-layout>