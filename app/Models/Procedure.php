<?php

namespace App\Models;

use App\Models\Circulation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Procedure extends Model
{
    use HasFactory;

    protected $table = 'procedures';

    protected $guarded = [];

    /** @return BelongsTo<Circulation,self> */
    public function circulation(): BelongsTo
    {
        return $this->belongsTo(Circulation::class);
    }
}
