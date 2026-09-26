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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table -> string('cmt');
            $table -> bigInteger('id_blog');
            $table -> bigInteger('id_user');
            $table -> string('avt_user');
            $table -> string('name_user');
            $table -> unsignedInteger('level') -> default(0) -> comment='0:cha 1:con';
            $table -> timestamp('time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};


// id, cmt, id_blog, id_user, name_user, image_user, level, time