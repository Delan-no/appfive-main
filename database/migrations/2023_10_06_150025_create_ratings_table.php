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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->datetime('date_time_rate');
            $table->string('step_grade')->nullable();
            $table->foreignId('folder_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interne_user_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('assessment_id')->cascadeOnDelete()->cascadeOnUpdate();     
            $table->foreignId('test_step_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
