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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('school_id');
            $table->string('student_id');
            $table->string('assign_subject_id');
            $table->string('school_year_id');
            $table->integer('quarter');
            $table->decimal('score', 2);
            $table->decimal('perfect_score', 2);
            $table->decimal('task_type', 2);
            $table->date('date');
            $table->integer('task_order')->default(0);
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
        Schema::dropIfExists('scores');
    }
};
