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
        Schema::create('wn_sub_categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("uuid");
            $table->string("category_uid")->nullable();
            $table->string("name")->nullable();
            $table->string("status")->nullable();
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("modified_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wn_sub_categories');
    }
};
