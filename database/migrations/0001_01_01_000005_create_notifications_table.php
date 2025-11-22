<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notification_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100)->nullable();
            $table->text('message');
            $table->enum('type', ['reminder','promo','confirmation'])->nullable();
            $table->timestamp('sent_at')->useCurrent();
            $table->timestamp('read_at')->nullable();

            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->index('user_id', 'idx_notification_user');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
