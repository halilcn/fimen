<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorProgramUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'mentor_program_user',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('mentor_program_id')->constrained('mentor_programs')->onDeleteCascade();
                $table->foreignId('user_id')->constrained('users')->onDeleteCascade();
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
        Schema::dropIfExists('mentor_program_user');
    }
}
