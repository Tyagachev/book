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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('co_author');
            $table->string('annotation')->nullable();
            $table->text('notes')->nullable();
            $table->integer('is_published')->default(0);
            $table->integer('moderation')->default(1);

            $table->unsignedBigInteger('subgenres_id');
            $table->foreign('subgenres_id')
                ->references('id')
                ->on('subgenres')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
