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
        Schema::create('lesson_discussions', function (Blueprint $table) {
            $table->id();
            $table->string('school_id');
            $table->string('lesson_id');
            $table->string('title');
            $table->text('description');
            $table->integer('quarter');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_active');
            $table->boolean('has_exam')->default(false);
            $table->integer('exam_attempt')->default(1);
            $table->time('exam_time')->nullable();
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
        Schema::dropIfExists('lesson_discussions');
    }
};
