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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('project_name');
            $table->string('thumbnail');
            $table->string('image');
            $table->text('description')->nullable();
            $table->text('short_description');
            $table->string('url')->nullable(); // Project link (Drive, YouTube, Figma, Website)
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('project_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
