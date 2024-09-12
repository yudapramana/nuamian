<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('book_code')->unique();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('thumbnail')->nullable();
            $table->foreignId('author_id')->nullable()->cascadeOnDelete(); //pengarang
            $table->foreignId('book_category_id')->nullable()->nullOnDelete();
            $table->foreignId('publisher_id')->nullable()->cascadeOnDelete(); //penerbit
            $table->year('publication_year'); //tahun terbit
            $table->string('isbn', 50)->nullable();
            $table->text('cover_image_url')->nullable();
            $table->text('book_source_url')->nullable();
            $table->text('book_source_id')->nullable();
            $table->enum('status', ['draft', 'in_stock', 'borrowed'])->default('draft');
            $table->boolean('is_visible')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
