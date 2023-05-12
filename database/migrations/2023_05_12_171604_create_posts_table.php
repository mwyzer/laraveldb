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
        Schema::create('posts', function (Blueprint $table) {
            $table  ->id()->from(startingValue: 1000);
            $table  ->string(column: 'title')->unique();
            $table  ->string(column: 'slug')->unique();
            $table  ->text(column: 'excerpt')
                    ->comment(comment: 'Summary of the post');
            $table->longText(column: 'description');
            $table->boolean(column: 'is_published')->default(value: false);
            $table->integer(column: 'min_to_read')->nullable(value: false);
            $table->timestamps();

            //unique alternative use
            // $table->unique(column: 'title');
            // $table->unique(['title','slug']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
