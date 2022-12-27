<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->id();
            $table->integer('grade');
            $table->unsignedBigInteger('penilai');
            $table->unsignedBigInteger('dinilai');
            $table->unsignedBigInteger('question_id');
            $table->integer('acakan_ke');
            $table->timestamps();

            $table->foreign('penilai')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dinilai')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade');
    }
};
