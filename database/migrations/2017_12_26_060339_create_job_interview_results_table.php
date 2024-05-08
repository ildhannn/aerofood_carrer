<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInterviewResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_interview_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_interview_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->integer('candidate_id')->unsigned();
            $table->integer('result')->nullable();
            $table->text('remark')->nullable();

            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('job_interview_id')->references('id')->on('job_interviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_interview_results');
    }
}
