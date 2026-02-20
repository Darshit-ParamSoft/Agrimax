<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTwoFactorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_two_factor', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->string('secret_key', 100)->nullable();
            $table->boolean('is_enabled')->default(0);
            $table->boolean('is_active')->nullable();
            $table->timestamps(0);  // equivalent to CURRENT_TIMESTAMP with auto-update
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_two_factor');
    }
}
