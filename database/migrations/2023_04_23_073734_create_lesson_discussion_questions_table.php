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
        Schema::create('lesson_discussion_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('school_id');
            $table->string('lesson_id');
            $table->string('lesson_discussion_id');
            $table->text('question');
            $table->string('question_type');
            $table->text('choices');
            $table->text('correct_answer');
            $table->decimal('points');
            $table->softDeletes();
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
        Schema::dropIfExists('lesson_discussion_questions');
    }
};
