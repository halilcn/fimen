<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'mentor_programs',
            function (Blueprint $table) {
                $table->id();
                $table->integer('mentor_id');
                $table->string('title', 1000);
                $table->string('explanation', 4000);
                $table->char('slug', 6);
                $table->integer('mentee_count');
                $table->dateTime('deadline');
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
        Schema::dropIfExists('mentor_programs');
    }
}
