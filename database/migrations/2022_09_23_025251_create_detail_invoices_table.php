<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_invoices', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('id_invoice');
            // $table->foreign('id_invoice')->references('id')->on('tbl_invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->string('item')->nullable();
            $table->text('description')->nullable();
            $table->integer('unit_cost')->nullable();
            $table->integer('qty')->nullable();
            $table->bigInteger('amount')->nullable();
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
        Schema::dropIfExists('tbl_detail_invoices');
    }
}
