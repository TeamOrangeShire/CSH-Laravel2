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
        Schema::create('csh_email_config', function (Blueprint $table) {
            $table->id('econf_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('csh_user');
            $table->string('econf_host');
            $table->string('econf_port');
            $table->string('econf_username')->nullable();
            $table->string('econf_password')->nullable();
            $table->string('econf_encryption');
            $table->string('econf_from_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csh_email_config');
    }
};
