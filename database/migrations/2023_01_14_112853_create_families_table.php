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
        Schema::create('families', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('school_id');
            $table->string('user_id');
            $table->string('primary_contact_person');
            $table->string('primary_contact_number');
            $table->string('primary_contact_email');
            $table->string('father_first_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('father_suffix_name')->nullable();
            $table->string('father_contact_no')->nullable();
            $table->date('father_birth_date')->nullable();
            $table->date('father_occupation')->nullable();
            $table->string('father_highest_education_attaiment')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_suffix_name')->nullable();
            $table->string('mother_contact_no')->nullable();
            $table->date('mother_birth_date')->nullable();
            $table->date('mother_occupation')->nullable();
            $table->string('mother_highest_education_attaiment')->nullable();
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_last_name')->nullable();
            $table->string('guardian_middle_name')->nullable();
            $table->string('guardian_suffix_name')->nullable();
            $table->string('guardian_contact_no')->nullable();
            $table->date('guardian_birth_date')->nullable();
            $table->date('guardian_occupation')->nullable();
            $table->string('guardian_highest_education_attaiment')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('families');
    }
};
