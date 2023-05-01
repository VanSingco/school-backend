<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_discussion_responses', function (Blueprint $table) {
            $table->id();
            $table->string('school_id');
            $table->string('lesson_id');
            $table->string('lesson_discussion_id');
            $table->string('lesson_discussion_attempt_id');
            $table->string('lesson_discussion_question_id');
            $table->string('student_id');
            $table->text('answer');
            $table->decimal('score');
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
        Schema::dropIfExists('lesson_discussion_responses');
    }
};
