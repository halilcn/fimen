<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorAppealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'mentor_appeal',
            function (Blueprint $table) {
                $table->id();
                $table->integer('user_id')->unique();
                $table->integer('competency_id');
                $table->integer('year');
                $table->string('file', 255);
                $table->string('linkedin', 255);
                $table->string('company_and_position', 255);
                $table->string('postscript');
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
        Schema::dropIfExists('mentor_appeal');
    }
}
