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
        Schema::create('wn_posts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("uuid");
            $table->string("admin_uid")->nullable();
            $table->string("alias")->nullable();
            $table->string("category_uid")->nullable();
            $table->string("sub_category_uid")->nullable();
            $table->string("title")->nullable();
            $table->text("content")->nullable();
            $table->string("media_location")->nullable();
            $table->integer("hits")->nullable();
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
        Schema::dropIfExists('wn_posts');
    }
};
