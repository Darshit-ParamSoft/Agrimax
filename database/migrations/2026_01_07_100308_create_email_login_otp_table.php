<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLoginOtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_login_otp', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->string('email', 256)->nullable();
            $table->string('otp_type', 20);
            $table->string('otp_hash', 256);
            $table->dateTime('expiry_time');
            $table->boolean('is_used')->default(0);
            $table->timestamps(0);  // equivalent to CURRENT_TIMESTAMP
            $table->dateTime('used_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_login_otp');
    }
}
