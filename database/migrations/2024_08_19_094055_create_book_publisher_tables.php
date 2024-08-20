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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_name');
            $table->string('publisher_address');
            $table->string('publisher_phone');
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('book_author');
            $table->decimal('book_price', 8, 2);
            $table->text('book_description')->nullable();
            $table->string('book_language');
            $table->date('book_publisher_date');
            $table->foreignId('book_publisher_id')->constrained('publishers')->onDelete('cascade');
            $table->string('book_image')->nullable();
            $table->integer('book_page_count');
            $table->string('book_reading_age')->nullable();
            $table->string('book_dimensions')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('publishers');
    }
};
