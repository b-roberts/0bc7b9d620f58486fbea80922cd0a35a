<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('views', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned()->index();
        $table->integer('schematic_id')->unsigned()->index();

        $table->timestamps();
      });
      Schema::table('views', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('schematic_id')->references('id')->on('schematics');
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
      Schema::table('views', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['schematic_id']);
    });
        Schema::dropIfExists('views');
  }
}
