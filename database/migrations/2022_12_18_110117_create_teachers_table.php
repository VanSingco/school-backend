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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id');
            $table->string('school_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('suffix_name')->nullable();
            $table->string('contact_no');
            $table->string('email');
            $table->string('major');
            $table->string('picture')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('street_address')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable(); 
            $table->string('country')->nullable();  
            $table->string('zipcode')->nullable();
            $table->string('highest_education_attaiment')->nullable();  
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
        Schema::dropIfExists('teachers');
    }
};
