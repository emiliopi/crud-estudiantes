<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students-subjects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_student');
            $table->uuid('id_subject');
            $table->timestamps();

            $table->foreign('id_student')->references('id')->on('students');
            $table->foreign('id_subject')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students-subjects');
    }
}
