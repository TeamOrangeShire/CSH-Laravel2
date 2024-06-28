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
        Schema::create('csh_mail_level', function (Blueprint $table) {
            $table->id('ml_id');
            $table->unsignedBigInteger('pl_id');
            $table->foreign('pl_id')->references('pl_id')->on('csh_pipeline');
            $table->string('ml_date_one');
            $table->string('ml_date_two');
            $table->string('ml_date_three');
            $table->string('ml_date_four');
            $table->string('ml_date_five');
            $table->string('ml_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_mail_level');
    }
};
