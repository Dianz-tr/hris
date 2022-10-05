<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_schedulings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->integer('employee_id');
            $table->string('date');
            $table->integer('shift_id')->nullable();
            $table->string('min_star_t');
            $table->string('star_t');
            $table->string('max_star_t');
            $table->string('min_end_t');
            $table->string('end_t');
            $table->string('max_end_t');
            $table->string('break_t');
            $table->string('repeat_every')->nullable();
            $table->string('end_on')->nullable();
            $table->string('acc_extra_h')->default('0');
            $table->string('publis')->default('0');
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
        Schema::dropIfExists('tbl_schedulings');
    }
}
