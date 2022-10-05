<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employees', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            // $table->string('username')->nullable();
            $table->string('email')->nullable();
            // $table->string('passwords')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('join')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('department_id')->nullable();
            // $table->unsignedInteger('users_id')->nullable();
            // $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('profil_image')->default('user.png');
            // $table->string('name')->nullable();
            // $table->date('birth')->nullable();
            // $table->enum('gender', ['male', 'famale']);
            // $table->string('address')->nullable();
            // $table->string('state')->nullable();
            // $table->string('country')->nullable();
            // $table->string('religion')->nullable();
            // $table->string('phone')->nullable();
            // $table->string('role_id')->nullable();
            // $table->boolean('full_time')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('tbl_employees');
    }
}
