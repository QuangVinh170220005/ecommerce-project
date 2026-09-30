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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> bigInteger('id_user');
            $table -> string('name');
            $table -> float('price');
            $table -> bigInteger('id_category');
            $table -> bigInteger('id_brand');
            $table -> boolean('status') -> default(0);
            $table -> integer('sale')-> default(0);
            $table -> string('company');
            $table -> string('image', 1000)-> nullable();
            $table -> string('detail');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
