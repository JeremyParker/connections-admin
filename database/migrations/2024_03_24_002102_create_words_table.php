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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('isDeleted')->default(true); // we soft delete words
            $table->string('text')->unique(); // user-facing word
            $table->boolean('isTopical'); // does this word have special meaning in the game's domain
            $table->unsignedBigInteger('creator');
            $table->foreign('creator')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
