<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_revenues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note');
            $table->date('revenue_date');
            $table->bigInteger('amount');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('tbl_categories')->onDelete('cascade')->onUpdate('cascade');
            // $table->bigInteger('overall_revenue');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('tbl_revenues');
    }
}
