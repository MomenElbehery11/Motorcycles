<?php

// database/migrations/xxxx_xx_xx_create_images_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
    $table->id();
    $table->string('path')->nullable();
    $table->decimal('price', 8, 2)->nullable();
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // اللي رفع الصورة
    $table->timestamps();
});

    }

    public function down()
{
    Schema::table('images', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
}
