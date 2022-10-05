<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('tbl_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->date('expense_date');
            $table->bigInteger('amount');
            // $table->bigInteger('overall_expense');
            $table->string('file');
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
        Schema::dropIfExists('tbl_expenses');
    }
}
