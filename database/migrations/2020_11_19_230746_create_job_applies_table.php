<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->id();
            $table->string('care_giver_id');
            $table->string('job_id');
            $table->enum('delivered', ['No', 'Yes'])->default('No');
            $table->enum('status', ['Pending', 'Approved', 'Denied'])->default('Pending');
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
        Schema::dropIfExists('job_applies');
    }
}
