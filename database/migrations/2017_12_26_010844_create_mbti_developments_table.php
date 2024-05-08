<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMbtiDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbti_developments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mbti_id')->unsigned();
            $table->text('development');

            $table->foreign('mbti_id')->references('id')->on('mbtis');
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
        Schema::dropIfExists('mbti_developments');
    }
}
