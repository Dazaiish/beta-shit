<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admin_car_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_user_id');
            $table->unsignedBigInteger('car_id');
            $table->timestamp('assigned_at')->useCurrent();

            $table->foreign('admin_user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->foreign('car_id')->references('car_id')->on('cars')->cascadeOnDelete();
            $table->index(['admin_user_id','car_id'], 'idx_admin_car');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_car_assignments');
    }
};
