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
            $table->string('site_app', 100);
            $table->string('name_app', 256);
            $table->string('server_app', 100);
            $table->string('port_app')->nullable();
            $table->string('server_db_app');
            $table->string('name_db_app')->nullable();
            $table->string('author_app');
            $table->string('url_intranet');
            $table->string('created_by', 100)->nullable();
            $table->timestamps();
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
