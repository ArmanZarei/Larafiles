<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 2;
    const ROLE_NORMAL = 1;

    protected $guarded = ['id'];

    protected $hidden = [
        'password' , 'remember_token'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }

    public function getCurrentSubscribe()
    {
        return $this->subscribes()->where('expires_at', '>=', Carbon::now())->first();
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class,'user_package')->withPivot(['amount' , 'created_at']);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getTextRoleAttribute()
    {
        $roles = [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_NORMAL => 'Normal'
        ];

        return key_exists($this->attributes['role'], $roles) ? $roles[$this->attributes['role']] : 'Unknown';
    }

    public function getIsAdminAttribute()
    {
        return $this->attributes['role'] == self::ROLE_ADMIN;
    }
}
