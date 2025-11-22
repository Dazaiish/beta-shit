<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->bigIncrements('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['chat','emergency','breakdown']);
            $table->text('description')->nullable();
            $table->enum('status', ['open','resolved'])->default('open');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('resolved_at')->nullable();

            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->index('user_id', 'idx_ticket_user');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
