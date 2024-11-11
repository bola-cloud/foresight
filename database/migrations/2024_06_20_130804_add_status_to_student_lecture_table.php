<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToStudentLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_lecture', function (Blueprint $table) {
            $table->integer('status')->default(1);
        });
    }

    public function down()
    {
        Schema::table('student_lecture', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

}
