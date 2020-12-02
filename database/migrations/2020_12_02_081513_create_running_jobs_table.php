<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunningJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('care_giver_id');
            $table->string('employer_id');
            $table->string('job_id');
            $table->string('date_start');
            $table->string('date_end')->nullable();
            $table->string('work_time')->nullable();
            $table->string('amount');
            $table->string('amount_worked')->nullable();
            $table->enum('paid', ['No', 'Yes'])->default('No');
            $table->enum('done', ['No', 'Yes'])->default('No');
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
        Schema::dropIfExists('running_jobs');
    }
}
