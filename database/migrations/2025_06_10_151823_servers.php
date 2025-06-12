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
        Schema::create('servers', function(Blueprint $table) {
            $table->id();
            $table->string('type_server', 45);
            $table->string('name_server', 150);
            $table->string('ip_server', 45);
            $table->string('os_server', 45);
            $table->string('os_version_server', 45);
            $table->string('php_version_server', 45)->nullable();
            $table->string('laravel_version_server', 45)->nullable();
            $table->string('created_by', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
