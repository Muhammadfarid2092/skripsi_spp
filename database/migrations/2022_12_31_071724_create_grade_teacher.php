<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_teacher', function (Blueprint $table) {
            $table->id();
            $table->integer('grade');
            $table->unsignedBigInteger('siswa');
            $table->integer('acakan_ke');
            $table->timestamps();

            $table->foreign('siswa')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_teacher');
    }
}
