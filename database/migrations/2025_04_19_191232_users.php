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

        Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('username', 150)->nullable();
            $table->string('password', 256)->nullable();
            $table->datetime('last_login')->nullable();
            $table->string('created_by', 150)->nullable();
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
