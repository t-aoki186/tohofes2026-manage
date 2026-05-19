<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $query = UploadedFile::query();

        // 検索機能（オプション）
        if ($request->has('search')) {
            $query->where('original_name', 'like', '%' . $request->search . '%');
        }

        // 拡張子でフィルター
        if ($request->has('extension')) {
            $query->where('extension', $request->extension);
        }

        $files = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $files->map(function ($file) {
                return [
                    'id' => $file->id,
                    'original_name' => $file->original_name,
                    'file_name' => $file->file_name,
                    'url' => $file->url,
                    'size' => $file->size,
                    'mime_type' => $file->mime_type,
                    'extension' => $file->extension,
                    'description' => $file->description,
                    'uploaded_at' => $file->created_at->toISOString()
                ];
            }),
            'meta' => [
                'current_page' => $files->currentPage(),
                'last_page' => $files->lastPage(),
                'per_page' => $files->perPage(),
                'total' => $files->total()
            ]
        ]);
    }

    public function show($filename)
    {
        $file = UploadedFile::where('file_name', $filename)->firstOrFail();

        if (!Storage::disk('public')->exists($file->file_path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $fileContent = Storage::disk('public')->get($file->file_path);

        return response($fileContent, 200)
            ->header('Content-Type', $file->mime_type)
            ->header('Content-Disposition', 'inline; filename="' . $file->original_name . '"')
            ->header('Access-Control-Allow-Origin', '*');
    }

    public function info($filename)
    {
        $file = UploadedFile::where('file_name', $filename)->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => [
                'original_name' => $file->original_name,
                'file_name' => $file->file_name,
                'url' => $file->url,
                'size' => $file->size,
                'mime_type' => $file->mime_type,
                'extension' => $file->extension,
                'description' => $file->description,
                'created_at' => $file->created_at->toISOString()
            ]
        ]);
    }
}
