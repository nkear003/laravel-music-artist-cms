<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('image')->nullable();
            $table->string('path_to_image')->nullable();
            $table->text('description');
            $table->date('released');
            $table->string('genre');
            $table->string('soundcloud_id');
            $table->string('mastered_by')->nullable();
            $table->string('slug')->unique();
            $table->string('wav')->nullable();
            $table->string('mp3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            Schema::dropIfExists('posts');
        });
    }
}
