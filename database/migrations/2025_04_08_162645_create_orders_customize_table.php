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
        Schema::create('orders_customize', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger("client_id");
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->unsignedBigInteger("delivery_id")->nullable();
            $table->foreign("delivery_id")->references("id")->on("deliveries")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->string('lacation');
            $table->string('image');
            $table->string('color');
            $table->integer('amount');
            $table->string('high');
            $table->string('width');
            $table->string('length');
            $table->enum('status',['accept','reject','pending','delivered'])->default('reject');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_customize');
    }
};
