<?php

namespace App\Supports;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function __construct(protected $disk = 'uploads')
    {
    }

    public function uploadFile(UploadedFile $file, $directory = '', $fillable = null, $collection = 'default')
    {
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $filePath = $directory ? $directory . '/' . $fileName : $fileName;
        Storage::disk($this->disk)->put($filePath, file_get_contents($file));

        $fileModel = File::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_size' => $file->getSize(),
            'file_type' => $file->getClientMimeType(),
            'fileable_id' => $fillable ? $fillable->id : null,
            'fileable_type' => $fillable ? get_class($fillable) : null,
            'collection' => $collection,
            'user_id' => auth()->id(),
            'file_extension' => $file->getClientOriginalExtension(),
        ]);

        return $fileModel;
    }

    // soft delete
    public function deleteFile($filePath)
    {
        if (Storage::disk($this->disk)->exists($filePath)) {
            Storage::disk($this->disk)->delete($filePath);
            File::where('file_path', $filePath)->update(['deleted_at' => now()]);
        }
    }

    // force delete
    public function forceDeleteFile($filePath)
    {
        if (Storage::disk($this->disk)->exists($filePath)) {
            Storage::disk($this->disk)->delete($filePath);
            File::where('file_path', $filePath)->forceDelete();
        }
    }

    public function getFileUrl($filePath)
    {
        return Storage::disk($this->disk)->url($filePath);
    }

    public function getFile($filePath)
    {
        if (!Storage::disk($this->disk)->exists($filePath)) return null;

        return Storage::disk($this->disk)->get($filePath);
    }
}
