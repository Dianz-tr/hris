<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_performapps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->date('date');
            $table->string('status');
            $table->string('cust_experience');
            $table->string('marketing');
            $table->string('management');
            $table->string('administration');
            $table->string('present_skill');
            $table->string('quality_work');
            $table->string('efficiency');
            $table->string('integrity');
            $table->string('professionalism');
            $table->string('team_work');
            $table->string('critical_thingking');
            $table->string('conflict_manage');
            $table->string('attendance');
            $table->string('ability_deadline');
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
        Schema::dropIfExists('tbl_performapps');
    }
}
