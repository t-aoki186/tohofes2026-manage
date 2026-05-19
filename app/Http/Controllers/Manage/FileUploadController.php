<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = UploadedFile::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.files.index', compact('files'));
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:51200', // 最大50MB
            'description' => 'nullable|string|max:500'
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $mimeType = $file->getMimeType();

        // 一意なファイル名を生成
        $fileName = Str::uuid() . '.' . $extension;
        $path = 'uploads/' . date('Y/m');
        $fullPath = $file->storeAs($path, $fileName, 'public');

        $uploadedFile = UploadedFile::create([
            'original_name' => $originalName,
            'file_name' => $fileName,
            'file_path' => $fullPath,
            'mime_type' => $mimeType,
            'size' => $size,
            'extension' => $extension,
            'description' => $request->description,
            'uploaded_by' => auth()->id()
        ]);

        return redirect()->route('admin.files.index')
            ->with('success', 'ファイルをアップロードしました。');
    }

    public function destroy($id)
    {
        $file = UploadedFile::findOrFail($id);

        // 物理ファイル削除
        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return redirect()->route('admin.files.index')
            ->with('success', 'ファイルを削除しました。');
    }
}
