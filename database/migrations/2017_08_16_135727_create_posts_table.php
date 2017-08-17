<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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
            $table->string('title');
            $table->string('path_to_image')->nullable();
            $table->text('body')->nullable();
            $table->date('released')->default(Carbon::now());
            $table->string('genre')->nullable();
            $table->string('soundcloud_id')->nullable();
            $table->string('mastered_by')->nullable();
            $table->string('slug')->unique();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('wav')->nullable();
            $table->string('mp3')->nullable();
            $table->boolean('is_featured')->default(0);
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
