<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'module_id',
        'file'
    ];

    public function fileUrl() : Attribute
    {
        if (str($this->file)->contains('http')) {
            return new Attribute(
                get: fn() => $this->file
            );
        }

        return new Attribute(
            get: fn () => $this->file
                ? Storage::disk('public')->url($this->file)
                : null
        );
    }

    public function module():BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
