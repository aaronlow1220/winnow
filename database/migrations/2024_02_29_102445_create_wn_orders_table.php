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
        Schema::create('wn_orders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("uuid");
            $table->string("user_uid");
            $table->string("total")->nullable();
            $table->string("payment_account")->nullable();
            $table->string("delivery_method");
            $table->string("delivery_address");
            $table->string("contact");
            $table->string("status");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("modified_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    // Status
    // NOT_PAID
    // SHIP_PENDING
    // SHIPPED
    // CANCELED
    // REFUND
    // COMPLETED

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wn_orders');
    }
};
