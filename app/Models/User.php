<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable, SoftDeletes;

    // The attributes that are mass assignable.
    protected $fillable = [
    'name',
    'name_en',
    'name_bn',
    'email',
    'contact_en',
    'contact_bn',
    'password',
    'role_id',
    'full_access',
    'status',
    'language',
    'image',
    'instructor_id',
];

    // The attributes that should be hidden for serialization.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation with role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function instructors()
    {
        $this->belongsTo(Instructor::class);
    }

    public function discussion()
    {
        return $this->hasMany(Discussion::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
    
    public function getAvatarAttribute()
    {
    // Если есть загруженная картинка
    if ($this->image) {
        return asset('storage/' . $this->image); // путь к загруженной аватарке
    }

    // Дефолтная аватарка
    return asset('images\avatar\1.png');
    }
}
