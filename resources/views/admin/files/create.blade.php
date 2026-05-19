<x-manage-layout>
    <x-slot:title>ファイルアップロード</x-slot:title>
    <x-slot:pageTitle>ファイルアップロード</x-slot:pageTitle>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 flex flex-col">
                        <input type="file" class="form-control @error('file') is-invalid @enderror text-white" name="file" required>
                        @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="description" class="text-white">説明</label>
                        <textarea class="bg-[#2c2d30] text-white p-2 rounded-xl" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="follow-btn">アップロード</button>
                    <a href="{{ route('admin.files.index') }}" class="cancel-btn">キャンセル</a>
                </form>
            </div>
        </div>
    </div>
</x-manage-layout>