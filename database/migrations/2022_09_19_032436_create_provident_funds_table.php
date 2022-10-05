<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidentFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_provident_funds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_name')->nullable();
            $table->foreign('employee_name')->references('id')->on('tbl_employees')->onDelete('cascade')->onUpdate('cascade');
            $table->string('provident_type');
            $table->bigInteger('employee_share_amount');
            $table->bigInteger('organization_share_amount');
            $table->string('employee_share');
            $table->string('organization_share');
            $table->text('description');
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
        Schema::dropIfExists('tbl_provident_funds');
    }
}
