<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->index()->unique();
            $table->string('cover')->nullable();
            $table->string('subtitle')->index()->nullable();
            $table->boolean('published')->default(false)->index();
            $table->boolean('featured')->default(false)->index();
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->index('updated_at');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
