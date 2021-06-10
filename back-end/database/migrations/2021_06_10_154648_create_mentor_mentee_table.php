<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorMenteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_mentee', function (Blueprint $table) {
            $table->id();
            $table->integer('mentor_id');
            $table->integer('user_id');
            $table->timestamps();

            //    $table->foreign('mentor_id')->references('id')->on('mentors');
            //    $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_mentee');
    }
}
