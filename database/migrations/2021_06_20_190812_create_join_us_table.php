<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_us', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->integer('id_tag')->unsigned()->index();
            $table->foreign('id_tag')->references('id')->on('join_us_tags')->onUpdate('cascade')->onDelete('cascade');

            $table->string('organisation');
            $table->string('reporting_to');
            $table->string('status');
            $table->string('project');
            $table->string('stat_date');
            $table->string('location');
            $table->longText('jd');
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
        Schema::dropIfExists('join_us');
    }
}
