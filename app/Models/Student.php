<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number',
        'formation',
        'level',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class,'userable');
    }
}

