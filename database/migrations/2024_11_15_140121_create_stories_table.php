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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('_id');
            $table->string('title')->nullable();
            $table->text('description');
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_published')->default(false);
            $table->boolean('is_under_review')->default(true);
            $table->boolean('copyright')->default(true);
            $table->boolean('is_xrated')->default(false);
            $table->boolean('is_book')->default(false);
            $table->string('img')->nullable();
            $table->text('slug');
            $table->text('audience');
            $table->bigInteger('likes_count')->default('0');
            $table->bigInteger('comments_count')->default('0');
            $table->bigInteger('views_count')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
