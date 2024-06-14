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
        Schema::create('csh_pipeline', function (Blueprint $table) {
            $table->id('pl_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('csh_user');
            $table->string('pl_company_name')->nullable();
            $table->string('pl_name')->nullable();
            $table->string('pl_email')->nullable();
            $table->string('pl_email_verification')->nullable();
            $table->string('pl_service_offer')->nullable();
            $table->string('pl_employee')->nullable();
            $table->string('pl_position')->nullable();
            $table->string('pl_status');
            $table->integer('pl_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_pipeline');
    }
};
