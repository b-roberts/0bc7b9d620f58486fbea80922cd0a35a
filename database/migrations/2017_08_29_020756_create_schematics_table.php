<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchematicsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('schematics', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->text('description');
        $table->integer('user_id')->unsigned()->index();
        $table->integer('category_id')->unsigned()->index();
        $table->longText('filedata');

        $table->timestamps();


    });

    Schema::table('schematics', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('category_id')->references('id')->on('categories');
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
      Schema::table('schematics', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['category_id']);

    });
        Schema::dropIfExists('schematics');
  }
}
