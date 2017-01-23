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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title', 256);
            $table->integer('price')->nullable();
            $table->string('state', 45)->default('hidden');
            $table->string('type', 10); // buy or sell
            $table->string('address');
            // $table->double('lat', 10, 6)->nullable();
            // $table->double('lng', 10, 6)->nullable();
            $table->string('slug', 256);
            $table->text('description');
            // $table->integer('category_detail_id')->unsigned();
            // $table->foreign('category_detail_id')->references('id')->on('category_details');
            // $table->integer('city_id')->unsigned();
            // $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('posts');
    }
}
