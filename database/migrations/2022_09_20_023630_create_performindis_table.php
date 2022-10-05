<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformindisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_performindis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designation_id');
            // $table->string('department');
            $table->string('added_by');
            $table->string('cust_experience');
            $table->string('integrity');
            $table->string('marketing');
            $table->string('professionalism');
            $table->string('management');
            $table->string('team_work');
            $table->string('administration');
            $table->string('critical_thinking');
            $table->string('present_skill');
            $table->string('conflict_management');
            $table->string('quality_work');
            $table->string('attendance');
            $table->string('efficiency');
            $table->string('abblity_deadline');
            $table->string('status');
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
        Schema::dropIfExists('tbl_performindis');
    }
}
