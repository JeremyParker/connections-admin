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
        Schema::create('category_word', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('word_id');
            $table->tinyInteger('difficulty_override')->unsigned()->nullable()->comment('Override difficulty level from 0 to 4');
            $table->text('example_sentence')->nullable();
            $table->dateTime('used_time')->nullable(); // the last date this category was used in a live game
            $table->dateTime('rejected_time')->nullable(); // the last time this category was in an auditioned game that was rejected
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->unique(['category_id', 'word_id'], 'category_word_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_word');
    }
};
