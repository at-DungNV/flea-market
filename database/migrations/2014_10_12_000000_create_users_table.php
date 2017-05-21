<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_id')->unique()->nullable();
            $table->string('name', 60);
            $table->string('email', 60)->unique();
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(0);
            $table->date('birthday')->nullable();
            $table->string('address', 256)->nullable();
            $table->string('phone', 40)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('avatar')->default('http://fleamarket.me/images/default.png');
            $table->integer('unread_notification')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->rememberToken()->nullable();
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
        Schema::drop('users');
    }
}
