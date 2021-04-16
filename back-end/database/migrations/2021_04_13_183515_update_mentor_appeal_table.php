<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMentorAppealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'mentor_appeal',
            function (Blueprint $table) {
                $table->string('file', 255)->nullable()->change();
                $table->string('linkedin', 255)->nullable()->change();
                $table->string('company_and_position', 255)->nullable()->change();
                $table->mediumText('postscript')->nullable()->change();
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
        //
    }
}
