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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id');
            $table->string('school_id');
            $table->string('lrn')->nullable();
            $table->bigInteger('number')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('suffix_name')->nullable();
            $table->string('id_picture')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('religion')->nullable();
            $table->string('street_address')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();   
            $table->string('zipcode')->nullable();
            $table->string('status');
            $table->string('type');
            $table->enum('payment_options', ['fullpayment', 'semi-annual', 'quarterly', 'monthly'])->defaults('quarterly');
            $table->string('grade_level_id');
            $table->string('last_grade_level_id')->nullable();
            $table->string('school_year_id');
            $table->string('last_school_year_id')->nullable();
            $table->string('primary_contact_person')->nullable();
            $table->string('primary_contact_no')->nullable();
            $table->string('primary_contact_relationship')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('students');
    }
};
