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
            $table->string('ml_date1');
            $table->string('ml_date2');
            $table->string('ml_date3');
            $table->string('ml_date4');
            $table->string('ml_date5');
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
