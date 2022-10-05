<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('for_month')->nullable();
            $table->string('id_salary')->nullable();
            $table->double('net_salary')->default(0);
            $table->double('basic')->default(0);
            $table->double('da')->default(0);
            $table->double('hra')->default(0);
            $table->double('conveyance')->default(0);
            $table->double('allowance')->default(0);
            $table->double('medical_allowance')->default(0);
            $table->double('other_earnings')->default(0);
            $table->double('tds')->default(0);
            $table->double('esi')->default(0);
            $table->double('pf')->default(0);
            $table->double('leave')->default(0);
            $table->double('prof_tax')->default(0);
            $table->double('labour_welfare')->default(0);
            $table->double('other_deduction')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_salaries');
    }
}
