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
        Schema::create('user_notes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('note');
            $table->foreignId('externe_user_id')->nullable();
            $table->foreignId('interne_user_id')->nullable();
            $table->foreignUuid('quiz_id');
            $table->timestamps();
            $table->foreign('interne_user_id')->references('id')->on('interne_users')->onDelete('SET NULL');
            $table->foreign('externe_user_id')->references('id')->on('externe_users')->onDelete('SET NULL');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_notes');
    }
};
