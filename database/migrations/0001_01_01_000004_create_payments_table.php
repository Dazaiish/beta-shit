<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('method', ['Card','E-Wallet','BankTransfer']);
            $table->enum('status', ['paid','pending','failed'])->default('pending');
            $table->dateTime('paid_at')->nullable();

            $table->foreign('booking_id')->references('booking_id')->on('bookings')->cascadeOnDelete();
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->foreign('payment_method_id')->references('payment_method_id')->on('payment_methods')->nullOnDelete();

            $table->index('booking_id', 'idx_payment_booking');
            $table->index('user_id', 'idx_payment_user');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
