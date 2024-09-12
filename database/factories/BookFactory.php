<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence();
        $slug = Str::slug($title, "-");
        return [
            'book_code' => fake()->sentence(),
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->paragraph(),
            'author_id' => rand(1,20),
            'book_category_id' => rand(1,6),
            'publisher_id' => rand(1,5),
            'publication_year' => fake()->year(),
            'isbn' => fake()->isbn10(),
            'created_at' => fake()->dateTimeBetween('-10 year', '-4 year'),
            'updated_at' => fake()->dateTimeBetween('-8 year', '-4 year'),
        ];
    }
}
