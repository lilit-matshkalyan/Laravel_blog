<?php

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
            $table->increments('user_id');
            $table->integer('company_info_id');
            $table->string('user_name')->unique();
            $table->string('password');
            $table->integer('employee_id');
            $table->string('current_login');
            $table->integer('status')->nullable();
            $table->integer('user_created');
            $table->integer('user_updated');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
