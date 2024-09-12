<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publisher extends Model
{

    /**
     * @var string
     */
    protected $table = 'publishers';

    protected $guarded = [];

    /** @return HasMany<Book> */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'publisher_id');
    }
}