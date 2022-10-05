<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterquestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_interquests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('department');
            $table->text('question');
            $table->string('opa');
            $table->string('opb');
            $table->string('opc');
            $table->string('opd');
            $table->string('cor_answer');
            $table->string('exp_answer');
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
        Schema::dropIfExists('tbl_interquests');
    }
}
