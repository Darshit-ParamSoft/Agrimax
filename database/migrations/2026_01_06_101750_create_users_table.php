<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Primary Key (Emp_id)
            $table->id('id');

            // Employee info
            $table->string('name', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
