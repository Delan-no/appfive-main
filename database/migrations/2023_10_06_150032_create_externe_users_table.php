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
        Schema::create('externe_users', function (Blueprint $table) {
            $table->id();
            $table-> string('email')->unique();
            // $table->foreignId('add_to_session_id');
            $table->timestamps();
            // $table->foreign('add_to_session_id')->references('id')->on('add_to_session')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('externe_users');
    }
};
