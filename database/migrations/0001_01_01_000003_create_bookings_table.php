<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['active','cancelled','completed'])->default('active');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->foreign('car_id')->references('car_id')->on('cars')->cascadeOnDelete();

            $table->index('user_id', 'idx_booking_user');
            $table->index('car_id', 'idx_booking_car');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
