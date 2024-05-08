<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('candidate_id');
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('why_hire_me')->nullable();
            $table->integer('nationality')->default(1);
            $table->string('country')->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('ktp')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('expected_salary')->nullable();
            $table->integer('experience')->default(0);
            $table->date('birth_date')->nullable();
            $table->integer('fresh_graduate')->default(0);
            $table->text('summary')->nullable();
            $table->string('cv')->nullable();
            $table->text('other_info')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
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
        Schema::dropIfExists('candidates');
    }
}
