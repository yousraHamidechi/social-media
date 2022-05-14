<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'password',
        'gender',
        'image'
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

    protected $appends = [
        'image_url'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ?
            'storage/' . $this->image :
            asset('assets/images/profile-pic.png');
    }

    public function getNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function friends()
    {
        return $this - belongsToMany(User::class, 'friends', 'friend_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
