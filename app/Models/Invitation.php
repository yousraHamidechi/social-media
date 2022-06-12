<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'requested_user'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function requestingUser():BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_user');
    }
}
