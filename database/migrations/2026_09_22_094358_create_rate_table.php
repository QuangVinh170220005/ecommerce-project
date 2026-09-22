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
        Schema::create('rate', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->bigInteger('id_blog');
            $table->bigInteger('id_user');
            $table->timestamp('time')-> useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate');
    }
};
