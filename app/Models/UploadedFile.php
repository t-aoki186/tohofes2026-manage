<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadedFile extends Model
{
    protected $fillable = [
        'original_name',
        'file_name',
        'file_path',
        'mime_type',
        'size',
        'extension',
        'description',
        'uploaded_by'
    ];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return url("/api/files/{$this->file_name}");
    }

    public function getFileUrlAttribute()
    {
        return Storage::disk('public')->url($this->file_path);
    }
}
