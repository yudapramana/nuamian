<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Member extends Model
{
    use HasFactory;

    protected $guards = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
