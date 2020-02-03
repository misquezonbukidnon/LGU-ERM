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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_number');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('suffix')->nullable();
            $table->integer('positions_id')->unsigned()->index();
            $table->integer('offices_id')->unsigned()->index();
            $table->string('address');
            $table->string('contact_number')->nullable();
            $table->string('emergency_contact_person')->nullable();
            $table->string('ecp_contact_number')->nullable();
            $table->integer('statuses_id')->unsigned()->index();
            $table->string('image')->nullable();
            $table->timestamps();

            
            $table->foreign('offices_id')
              ->references('id')
              ->on('offices')
              ->onDelete('cascade');

            $table->foreign('positions_id')
              ->references('id')
              ->on('positions')
              ->onDelete('cascade');

            $table->foreign('statuses_id')
              ->references('id')
              ->on('statuses')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
