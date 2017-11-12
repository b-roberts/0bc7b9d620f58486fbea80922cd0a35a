<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbuseReports extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('abuse_reports', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned()->index();
        $table->integer('type')->unsigned()->index();
        $table->string('ip');
        $table->text('description');
        $table->boolean('dismissed');
        $table->integer('reportable_id');
        $table->string('reportable_type');
        $table->timestamps();
    });
    Schema::create('abuse_report_categories', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->text('description');
        $table->timestamps();
    });
    Schema::table('abuse_reports', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('type')->references('id')->on('abuse_report_categories');

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
      Schema::table('abuse_reports', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['type']);
    });
        Schema::dropIfExists('abuse_report_categories');
        Schema::dropIfExists('abuse_reports');
  }
}
