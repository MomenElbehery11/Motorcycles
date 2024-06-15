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
            $table->string('path')->default('abc');
            $table->timestamps();
            $table->decimal('price', 8, 2)->default(5950);
            $table->integer('quantity')->default(0);
            $table->decimal('total', 8, 2)->default(0);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('reciet')->default('abc');

        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
