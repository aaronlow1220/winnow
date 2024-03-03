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
        Schema::create('wn_users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("uuid");
            $table->string("username")->nullable();
            $table->string("email")->nullable();
            $table->string("password")->nullable();
            $table->string("phone")->nullable();
            $table->string("telephone")->nullable();
            $table->string("contact_address")->nullable();
            $table->string("delivery_address")->nullable();
            $table->string("status")->default("ACTIVE");
            $table->int("is_admin")->default(0);
            $table->string("google_id")->nullable();
            $table->string("facebook_id")->nullable();
            $table->string("remember_token")->nullable();
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("modified_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wn_users');
    }
};
