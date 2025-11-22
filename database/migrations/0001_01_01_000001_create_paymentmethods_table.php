<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->bigIncrements('payment_method_id');
            $table->unsignedBigInteger('user_id');
            $table->string('provider', 50);
            $table->string('token', 255);
            $table->string('last4', 4)->nullable();
            $table->date('expiry')->nullable();
            $table->boolean('is_default')->default(false);

            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
