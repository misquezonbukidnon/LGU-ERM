<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('offices_id')->unsigned()->index();
            $table->integer('roles_id')->unsigned()->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('offices_id')
              ->references('id')
              ->on('offices')
              ->onDelete('cascade');

            $table->foreign('roles_id')
              ->references('id')
              ->on('roles')
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
        Schema::dropIfExists('users');
    }
}
