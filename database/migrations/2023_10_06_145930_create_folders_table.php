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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id');
            $table->string('study_level',40);
            $table->string('year_graduated', 255);
            $table->string('university', 100);
            $table->string('graduated_field', 100);
            $table->string('actual_situation',100);
            $table->string('english_level', 50);
            $table->text('why_us');
            $table->text('your_expectations');
            $table->text('just_imagin');
            $table->text('your_futur');
            $table->string('know_us', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
