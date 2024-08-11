<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'uuid',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'file_path',
        'file_url',
        'file_extension',
        'file_size',
        'file_type',
        'collection_name',
        'alt',
        'caption',
        'url',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
