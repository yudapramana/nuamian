<?php

namespace App\Models;

use App\Models\Book;
use App\Enums\CirculationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circulation extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'circulations';

    protected $guard = [];

    protected $casts = [
        'status' => CirculationStatus::class,
    ];

    /** @return HasMany<Procedure> */
    public function procedures(): HasMany
    {
        return $this->hasMany(Procedure::class);
    }

    /** @return BelongsTo<Member,self> */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /** @return BelongsTo<Book,self> */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
