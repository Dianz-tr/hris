<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('budget_title');
            $table->string('budget_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('revenue_title');
            $table->string('revenue_amount');
            $table->bigInteger('overall_revenue')->nullable();
            $table->string('expense_title');
            $table->string('expense_amount');
            $table->bigInteger('overall_expense')->nullable();
            $table->bigInteger('profit')->nullable();
            $table->bigInteger('tax_amount');
            $table->bigInteger('budget_amount');
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
        Schema::dropIfExists('tbl_budgets');
    }
}
