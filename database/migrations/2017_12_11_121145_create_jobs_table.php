<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_id');
            $table->string('preq')->nullable();
            $table->string('preq_file')->nullable();
            $table->integer('need')->nullable();
            $table->string('title')->nullable()->default('');
            $table->text('description')->nullable();
            $table->integer('min_education')->nullable()->default(0);
            $table->integer('min_age')->nullable()->default(0);
            $table->integer('max_age')->nullable()->default(0);
            $table->integer('min_experience')->nullable()->default(0);
            $table->integer('min_salary')->nullable()->default(0);
            $table->integer('max_salary')->nullable()->default(0);
            $table->date('start_date')->nullable()->default(null);
            $table->date('end_date')->nullable()->default(null);
            $table->integer('status')->nullable();

            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('field_id')->unsigned()->nullable();
            $table->integer('field_specialization_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('field_id')->references('id')->on('fields');
            $table->foreign('field_specialization_id')->references('id')->on('field_specializations');
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('jobs');
    }
}
