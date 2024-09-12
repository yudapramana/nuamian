<?php

use \App\Models\Circulation;
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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Circulation::class);
            $table->enum('type', ['reserved', 'extended', 'returned', 'cancelled'])->default('reserved');
            $table->enum('status', ['waiting','accepted', 'rejected'])->default('waiting');
            $table->date('confirm_date')->nullable();
            $table->integer('total_days')->default(3);
            $table->date('due_date')->nullable();
            $table->string('assessor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
