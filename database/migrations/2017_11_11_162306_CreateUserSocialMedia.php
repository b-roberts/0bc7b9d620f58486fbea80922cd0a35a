<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialMedia extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('social_media', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('url');
        $table->timestamps();
    });
    Schema::create('social_media_user', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned()->index();
        $table->integer('social_media_id')->unsigned()->index();
        $table->string('handle');
        $table->timestamps();
    });
    Schema::table('social_media_user', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('social_media_id')->references('id')->on('social_media');
  });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      //
      Schema::table('social_media_user', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['social_media_id']);
    });
        Schema::dropIfExists('social_media_user');
        Schema::dropIfExists('social_media');
  }
}
