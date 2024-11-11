<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_id');
            $table->foreign('block_id')->references('id')->on('money_blocks')->onDelete('cascade')->nullable();
            $table->string('question');
            $table->char('a')->nullable();
            $table->char('b')->nullable();
            $table->char('c')->nullable();
            $table->char('d')->nullable();
            $table->string('answer')->nullable();
            $table->string('trueanswer')->nullable();
            $table->enum('type',['normal','block','pargraph']);
            $table->enum('year_type',['ONE','TWO','THREE']);
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
        Schema::dropIfExists('money_questions');
    }
}
