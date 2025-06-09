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
        Schema::create('usuarios', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nome', '100')->nullable();
            $table->string('usuario', '150')->nullable();
            $table->string('senha', '256')->nullable();
            $table->datetime('ultimo_login')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
