<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrolltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payrolltypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_a')->nullable();
            $table->string('category_a')->nullable();
            $table->string('amount_a')->nullable();
            $table->string('name_o')->nullable();
            $table->string('rtype_o')->nullable();
            $table->string('rate_o')->nullable();
            $table->string('name_d')->nullable();
            $table->string('amount_d')->nullable();
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
        Schema::dropIfExists('tbl_payrolltypes');
    }
}
