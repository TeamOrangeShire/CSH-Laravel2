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
        Schema::create('csh_email_template', function (Blueprint $table) {
            $table->id('emtemp_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('csh_user');
            $table->string('emtemp_name', 50);
            $table->longText('emtemp_content');
            $table->longText('emtemp_followup');
            $table->integer('emtemp_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_email_template');
    }
};
