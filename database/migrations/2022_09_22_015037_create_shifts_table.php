<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('min_star_t');
            $table->string('star_t');
            $table->string('max_star_t');
            $table->string('min_end_t');
            $table->string('end_t');
            $table->string('max_end_t');
            $table->string('break_t');
            $table->string('repeat_every');
            $table->string('end_on');
            $table->string('add_tag')->nullable();
            $table->string('add_note')->nullable();
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
        Schema::dropIfExists('tbl_shifts');
    }
}
