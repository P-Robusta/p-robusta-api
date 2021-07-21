<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumberOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_overviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_students');
            $table->integer('alumni');
            $table->integer('current_students');
            $table->integer('average_wage');
            $table->tinyInteger('percent_get_job');
            $table->tinyInteger('percent_alumni_it');
            $table->tinyInteger('alumni_allowance');
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
        Schema::dropIfExists('number_overviews');
    }
}
