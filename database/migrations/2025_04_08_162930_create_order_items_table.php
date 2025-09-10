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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger("client_id");
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->integer('amount')->default(1);
            $table->string('color');
            $table->enum("status",['buying','notbuying'])->default('notbuying');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
