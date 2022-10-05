<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_attendances', function (Blueprint $table) {
            $table->increments('id', true);
            $table->timestamps();
            $table->integer('user_id');
            $table->string('name');
            $table->date('date');
            $table->time('masuk');
            $table->time('keluar')->nullable();
            $table->integer('production')->nullable();
            $table->string('note_in')->default('Punch In at');
            $table->string('note_out')->nullable();
            $table->boolean('status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
