<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorMenteeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'mentor_mentee_notifications',
            function (Blueprint $table) {
                $table->id();
                $table->integer('mentor_mentee_id')->references('id')->on('mentor_mentee');
                $table->string('notification_type');
                $table->jsonb('data');
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
        Schema::dropIfExists('mentor_mentee_notifications');
    }
}
