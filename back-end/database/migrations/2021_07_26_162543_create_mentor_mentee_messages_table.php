<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorMenteeMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'mentor_mentee_messages',
            function (Blueprint $table) {
                $table->id();
                $table->integer('mentor_mentee_id')->references('id')->on('mentor_mentee');
                $table->integer('from_user_id')->references('id')->on('users');
                $table->integer('to_user_id')->references('id')->on('users');
                $table->string('message');
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
        Schema::dropIfExists('mentor_mentee_messages');
    }
}
