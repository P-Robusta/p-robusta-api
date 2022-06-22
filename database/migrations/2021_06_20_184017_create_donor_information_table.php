<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDonorInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('donor_name');
            $table->double('total_donation_amount');
            $table->double('latest_donation_amount');
            $table->string('currency_unit');
            $table->string('donor_type');
            $table->tinyInteger('num_of_donation');
            $table->date('start_donate');
            $table->date('latest_donate');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donor_information');
    }
}
