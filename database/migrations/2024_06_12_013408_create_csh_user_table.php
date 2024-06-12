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
        Schema::create('csh_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name', 100);
            $table->string('user_username', 100);
            $table->string('user_password', 100);
            $table->string('user_position', 100);
            $table->string('user_pic', 100);
            $table->string('user_remember', 100);
            $table->string('user_type', 100);
            $table->string('user_status', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_user');
    }
};
