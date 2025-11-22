<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admin_user_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_user_id');
            $table->unsignedBigInteger('target_user_id')->nullable();
            $table->unsignedBigInteger('target_car_id')->nullable();
            $table->string('action_type', 100);
            $table->text('notes')->nullable();
            $table->timestamp('timestamp')->useCurrent();

            $table->foreign('admin_user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->foreign('target_user_id')->references('user_id')->on('users')->nullOnDelete();
            $table->foreign('target_car_id')->references('car_id')->on('cars')->nullOnDelete();

            $table->index(['admin_user_id','target_user_id','target_car_id'], 'idx_admin_action');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_user_actions');
    }
};
