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

        Schema::create('apps', function(Blueprint $table) {
            $table->id();
            $table->string('site_app', 45);
            $table->string('name_app', 256);
            $table->string('server_app', 45);
            $table->string('port_app')->nullable();
            $table->string('server_db_app')->nullable();
            $table->string('name_db_app')->nullable();
            $table->string('php_version_app', 45)->nullable();
            $table->string('laravel_version_app', 45)->nullable();
            $table->string('internal_url_app', 256)->nullable();
            $table->string('external_url_app', 256)->nullable();
            $table->string('repository_app', 256)->nullable();
            $table->string('developer_app', 150)->nullable();
            $table->string('created_by', 150);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps');
    }
};
