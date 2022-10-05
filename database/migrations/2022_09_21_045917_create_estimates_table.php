<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estimate_id');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('tbl_clients')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('tbl_projects')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->nullable();
            $table->unsignedInteger('tax_id')->nullable();
            $table->foreign('tax_id')->references('id')->on('tbl_taxes')->onDelete('cascade')->onUpdate('cascade');
            $table->text('client_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->date('estimate_date');
            $table->date('expiry_date');
            $table->bigInteger('total')->nullable();
            $table->string('tax')->nullable();
            $table->string('discount')->nullable();
            $table->bigInteger('grand_total')->nullable();
            $table->text('other_info')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('tbl_estimates');
    }
}
