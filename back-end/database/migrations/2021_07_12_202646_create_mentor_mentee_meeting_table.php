<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorMenteeMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'mentor_mentee_meeting',
            function (Blueprint $table) {
                $table->id();
                $table->integer('mentor_mentee_program_id')->references('id')->on('mentor_mentee');
                $table->string('address');
                $table->string('explanation');
                $table->dateTime('date');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_mentee_meeting');
    }
}
