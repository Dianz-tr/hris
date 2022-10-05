<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('asset_user')->nullable();
            $table->foreign('asset_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('asset_name');
            $table->string('asset_id');
            $table->string('model');
            $table->string('serial_number');
            $table->string('supplier');
            $table->string('condition');
            $table->string('purchase_date');
            $table->string('warranty');
            $table->string('warranty_end');
            $table->bigInteger('price');
            $table->string('status')->nullable()->default('pending');
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
        Schema::dropIfExists('tbl_assets');
    }
}
