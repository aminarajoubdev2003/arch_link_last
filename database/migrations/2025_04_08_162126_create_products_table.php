<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->enum('site',['internal','external']);
            $table->string('category');
            $table->string('type');
            $table->string('style');
            $table->string('material');
            $table->integer('price');
            $table->string('height');
            $table->string('width');
            $table->string('length');
            $table->string('color');
            $table->string('sale')->default('0%');
            $table->text('desc');
            $table->json('images');
            $table->string('block_file');
            $table->string('time_to_make');
            $table->softDeletes();
            $table->timestamps();
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
