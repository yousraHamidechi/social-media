<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'image',
        'user_id',
        'tags'
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
                : null
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
