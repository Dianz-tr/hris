<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('tbl_clients')->onDelete('cascade')->onUpdate('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('lead_project')->nullable();
            $table->foreign('lead_project')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('rate');
            $table->string('priority');
            $table->text('description');
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
        Schema::dropIfExists('tbl_projects');
    }
}
