<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Modules\User\Database\Factories\UserMetaFactory;

class UserMeta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'key',
        'value',
    ];

    protected static function newFactory()
    {
        //return UserMetaFactory::new();
    }

    # Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getMeta($user_id, $key)
    {
        return Cache::remember("user_{$user_id}_{$key}", 60, function () use ($user_id, $key) {
            return self::where('user_id', $user_id)->where('key', $key)->first()->value ?? null;
        });
    }

    public static function getMetaAll($user_id)
    {
        return Cache::remember("user_{$user_id}_all", 60, function () use ($user_id) {
            return self::where('user_id', $user_id)->get();
        });
    }

    public static function setMeta($user_id, $key, $value)
    {
        Cache::forget("user_{$user_id}_{$key}");
        return self::updateOrCreate(
            ['user_id' => $user_id, 'key' => $key],
            ['value' => $value]
        );
    }

    public static function deleteMeta($user_id, $key)
    {
        Cache::forget("user_{$user_id}_{$key}");
        return self::where('user_id', $user_id)->where('key', $key)->delete();
    }

    # Accessors & Mutators


}
