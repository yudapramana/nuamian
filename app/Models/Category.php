<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

     /**
     * @var string
     */
    protected $table = 'book_categories';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    // one category have many book
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}