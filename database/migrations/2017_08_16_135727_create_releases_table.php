<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body')->nullable();
            $table->date('released')->default(Carbon::now());
            $table->string('mastered_by')->nullable();
            $table->string('genre')->nullable();
            $table->string('image_id')->nullable();
            $table->string('mp3_id')->nullable();
            $table->string('wav_id')->nullable();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('soundcloud_id')->nullable();
            $table->string('slug')->unique();
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
        Schema::table('releases', function (Blueprint $table) {
            Schema::dropIfExists('releases');
        });
    }
}
