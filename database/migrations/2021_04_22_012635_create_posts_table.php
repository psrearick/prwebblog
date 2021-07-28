<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('excerpt');
            $table->text('body');
            $table->string('slug');
            $table->foreignId('category_id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }
}
