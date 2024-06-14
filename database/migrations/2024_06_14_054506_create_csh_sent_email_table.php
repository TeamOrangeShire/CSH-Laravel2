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
        Schema::create('csh_sent_email', function (Blueprint $table) {
            $table->id('se_id');
            $table->unsignedBigInteger('pl_id');
            $table->foreign('pl_id')->references('pl_id')->on('csh_pipeline');
            $table->string('se_level', 20);
            $table->string('se_date', 20);
            $table->integer('se_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_sent_email');
    }
};
