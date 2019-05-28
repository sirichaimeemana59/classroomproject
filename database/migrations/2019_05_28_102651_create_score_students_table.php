<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('score');
            $table->integer('id_teacher');
            $table->integer('id_student');
            $table->text('code');
            $table->integer('id_ans');
            $table->integer('id_question');
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
        Schema::dropIfExists('score_students');
    }
}
