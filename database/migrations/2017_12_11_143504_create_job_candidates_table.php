<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->integer('candidate_id')->unsigned();
            $table->float('suitability')->nullable();
            $table->integer('progress');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status');

            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('candidate_id')->references('id')->on('candidates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_candidates');
    }
}
