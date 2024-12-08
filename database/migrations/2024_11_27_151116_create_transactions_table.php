<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('order_id')->unique()->nullable(); // Unique order ID
            $table->foreignId('room_id')->nullable(); // Foreign key to rooms table
            $table->string('name')->nullable(); // Customer name
            $table->string('email')->nullable(); // Customer email
            $table->string('phone')->nullable(); // Customer phone number
            $table->bigInteger('gross_amount')->nullable(); // Total amount
            $table->string('status')->default('pending')->nullable(); // Payment status
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
