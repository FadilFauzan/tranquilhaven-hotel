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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('guests');
            $table->string('size');
            $table->integer('price');
            $table->string('status')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
