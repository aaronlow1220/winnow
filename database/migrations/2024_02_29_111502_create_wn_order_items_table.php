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
        Schema::create('wn_order_items', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("uuid");
            $table->string("user_uid");
            $table->string("order_uid")->nullable();
            $table->string("product_uid")->nullable();
            $table->integer("quantity")->nullable();
            $table->string("status");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("modified_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    // Status
    // ACTIVE

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wn_order_items');
    }
};
