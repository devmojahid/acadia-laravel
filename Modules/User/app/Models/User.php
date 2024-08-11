<?php

namespace Modules\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function getRoleAttribute()
    {
        $roles = $this->getRoleNames(); // This returns a collection
        return $roles->isNotEmpty() ? $roles->first() : null; // Return the first role or null if no roles
    }

    protected static function newFactory()
    {
        return UserFactory::new();
    }


    public function copyDefaultAvatar()
    {
        $avaterPath = public_path('/avatars/default.jpg');
        // make a copy of the default avatar

        mkdir(public_path('/users/avatars/' . $this->id), 0777, true);

        $avatarPath = public_path('/users/avatars/' . $this->id . '.jpg');
        copy($avaterPath, $avatarPath);
        // save on meta
        $this->setMeta('avatar', $avatarPath);
        $this->save();
    }

    public function meta()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function getMeta($key)
    {
        return UserMeta::getMeta($this->id, $key);
    }

    public function setMeta($key, $value)
    {
        return UserMeta::setMeta($this->id, $key, $value);
    }

    public function deleteMeta($key)
    {
        return UserMeta::deleteMeta($this->id, $key);
    }
}
