<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'objective',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class,'userable');
    }
}
