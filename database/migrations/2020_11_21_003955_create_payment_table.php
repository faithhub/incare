<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id')->nullable();
            $table->string('job_id')->nullable();
            $table->string('user_id');
            $table->float('amount', 10, 2);
            $table->string('status');
            $table->string('reference');
            $table->string('message');
            $table->string('transaction');
            $table->string('trxref');
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
        Schema::dropIfExists('payment');
    }
}
