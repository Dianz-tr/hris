<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_terminations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term_employee');
            $table->string('term_type');
            $table->date('term_date');
            $table->string('departement');
            $table->string('reason');
            $table->date('not_date');
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
        Schema::dropIfExists('tbl_terminations');
    }
}
