<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('interne_user_id')->nullable();
            $table->foreignId('externe_user_id')->nullable();
            $table->foreignUuid('quiz_id');
            $table->foreignUuid('possible_answer_id');
            $table->foreignUuid('question_id');
            $table->timestamps();
            $table->foreign('interne_user_id')->references('id')->on('interne_users')->cascadeOnDelete();
            $table->foreign('externe_user_id')->references('id')->on('externe_users')->cascadeOnDelete();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->cascadeOnDelete();
            $table->foreign('possible_answer_id')->references('id')->on('possible_answers')->cascadeOnDelete();
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_answers');
    }
};
