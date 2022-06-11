<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function imageUrl() : Attribute
    {
        if (str($this->image)->contains('http')) {
            return new Attribute(
                get: fn() => $this->image
            );
        }

        return new Attribute(
            get: fn () => $this->image
                ? Storage::disk('public')->url($this->image)
                : asset('assets/images/shortcut-1.png')
        );
    }

    public function lessons():HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function works():HasMany
    {
        return $this->hasMany(Work::class);
    }

    public function tutorials():HasMany
    {
        return $this->hasMany(Tutorial::class);
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
