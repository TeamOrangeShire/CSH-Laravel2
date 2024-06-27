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
        Schema::create('csh_sent_mail', function (Blueprint $table) {
            $table->id('se_id');
            $table->unsignedBigInteger('pl_id');
            $table->foreign('pl_id')->references('pl_id')->on('csh_pipeline');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('csh_user');
            $table->string('se_offer');
            $table->longtext('se_message');
            $table->string('se_subject');
            $table->string('se_date');
            $table->string('se_level');
            $table->string('se_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_sent_mail');
    }
};
