<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_overtimes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('ot_date');
            $table->string('ot_hours');
            $table->string('description');
            $table->boolean('status')->default('1');
            $table->string('approved_by');
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
        Schema::dropIfExists('tbl_overtimes');
    }
}
