<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_file', function (Blueprint $table) {
            $table->increments('file_id');
            $table->string('file_name');
            $table->integer('course_type_id');
            $table->integer('course_id');
            $table->integer('semester_id');
            $table->integer('department_id');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_file');
    }
}
