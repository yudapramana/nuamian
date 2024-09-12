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
        Schema::table('book_categories', function (Blueprint $table) {
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_visible')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_categories', function (Blueprint $table) {
            //
        });
    }
};
