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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("product_id");
            $table->enum("rate",[0,1,2,3,4,5])->default(0);
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("CASCADE")->onUpdate("cascade");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade")->onUpdate("cascade");
            $table->unique(["client_id","product_id"]);
            $table->string('opinion');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
