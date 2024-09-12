<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    // eagerload for optimization load query relationship
    protected $with = ['category', 'author', 'publisher'];

    //one bookdetail have one category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'book_category_id');
    }

    //one bookdetail have one author
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    //one bookdetail have one publisher
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    //one book have many borrowing
    public function borrowing()
    {
        return $this->hasMany(Borrowing::class);
    }

    // img book accessor
    public function getBookImgAttribute()
    {
        return "/storage/" . $this->thumbnail;
    }
}
