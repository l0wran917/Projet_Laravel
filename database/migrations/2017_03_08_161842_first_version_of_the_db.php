<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstVersionOfTheDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_follower');
            $table->integer('id_followed');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 141);
            $table->integer('id_user');
            $table->integer('id_post');
            $table->timestamps();
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_post');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'lastname');
            $table->string('firstname');
            $table->string('picture');
            $table->string('pseudo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('likes');

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('lastname', 'name');
            $table->dropColumn('lastname');
            $table->dropColumn('firstname');
            $table->dropColumn('picture');
            $table->dropColumn('pseudo');
        });
    }
}
