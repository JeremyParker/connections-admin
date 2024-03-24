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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 256)->unique();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('creator');
            $table->foreign('creator')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('editor')->nullable();
            $table->foreign('editor')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('usedTime')->nullable(); // the last date this category was used in a live game
            $table->dateTime('rejectedTime')->nullable(); // the last time this category was in an auditioned game that was rejected
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
