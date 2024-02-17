<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wn_products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("uuid");
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->string("price")->nullable();
            $table->string("discount_price")->nullable();
            $table->string("vendor")->nullable();
            $table->string("cover_image")->nullable();
            $table->string("images")->nullable();
            $table->integer("amount")->nullable();
            $table->json("allowed_delivery_method")->nullable();
            $table->boolean("is_halal")->nullable();
            $table->integer("purchase_count")->nullable();
            $table->string("status")->nullable()->default("ACTIVE");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("modified_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wn_products');
    }
};
