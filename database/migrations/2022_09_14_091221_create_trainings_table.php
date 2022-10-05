<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('training_type');
            $table->string('trainer');
            $table->string('employee');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->bigInteger('cost');
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
        Schema::dropIfExists('tbl_trainings');
    }
}
