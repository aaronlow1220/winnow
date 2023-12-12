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
            $table->string("real_name")->nullable();
            $table->string("email")->nullable();
            $table->string("password")->nullable();
            $table->dateTime("data_of_birth")->nullable();
            $table->string("gender")->nullable();
            $table->string("phone")->nullable();
            $table->string("telephone")->nullable();
            $table->string("address")->nullable();
            $table->string("profile_picture")->nullable();
            $table->string("status")->default("ACTIVE");
            $table->boolean("is_admin")->default(false);
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
