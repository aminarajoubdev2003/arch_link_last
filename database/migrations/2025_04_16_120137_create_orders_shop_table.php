
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
        Schema::create('orders_shop', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger("order_item_id");
            $table->foreign("order_item_id")->references("id")->on("order_items")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->unsignedBigInteger("delivery_id")->nullable();
            $table->foreign("delivery_id")->references("id")->on("deliveries")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->string('location');
            $table->integer('total');
            $table->enum('status',['pending','delivered'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_shop');
    }
};
