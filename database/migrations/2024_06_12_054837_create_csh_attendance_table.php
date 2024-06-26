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
        Schema::create('csh_attendance', function (Blueprint $table) {
            $table->id('att_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('csh_user');
            $table->string('att_time_in', 10);
            $table->string('att_time_out', 10);
            $table->string('att_date', 15);
            $table->string('att_total_time', 20);
            $table->integer('att_total_hours');
            $table->integer('att_total_minutes');
            $table->integer('att_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_attendance');
    }
};
