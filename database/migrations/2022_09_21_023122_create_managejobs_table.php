<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagejobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_managejobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
            $table->string('departmen');
            $table->string('candidate');
            $table->string('job_location');
            $table->integer('no_vacancies');
            $table->string('experience');
            $table->integer('age');
            $table->integer('salary_from');
            $table->integer('salary_to');
            $table->string('job_type');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description');
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
        Schema::dropIfExists('tbl_managejobs');
    }
}
