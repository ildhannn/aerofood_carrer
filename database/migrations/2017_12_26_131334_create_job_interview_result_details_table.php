<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInterviewResultDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_interview_result_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_interview_result_id')->unsigned();
            $table->integer('interview_form_id')->unsigned();
            $table->float('rating');
            $table->text('description');
            $table->timestamps();

            $table->foreign('job_interview_result_id')->references('id')->on('job_interview_results');
            $table->foreign('interview_form_id')->references('id')->on('interview_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_interview_result_details');
    }
}
