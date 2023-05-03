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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('userID');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phoneno');
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('reset_token')->nullable();
            $table->string('reset_token_expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
