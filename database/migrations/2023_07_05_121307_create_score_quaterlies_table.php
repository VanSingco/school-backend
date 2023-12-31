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
        Schema::create('score_quaterlies', function (Blueprint $table) {
            $table->id();
            $table->string('school_id');
            $table->string('student_id');
            $table->string('assign_subject_id');
            $table->string('school_year_id');
            $table->integer('quarter');
            $table->decimal('score', 2);
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
        Schema::dropIfExists('score_quaterlies');
    }
};
