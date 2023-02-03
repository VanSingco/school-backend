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
        Schema::create('schools', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_number');
            $table->string('name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('logo');
            $table->string('subdomain')->unique();
            $table->string('curricular_offering');
            $table->string('classification');
            $table->string('district');
            $table->string('division');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('country');
            $table->string('address')->nullable();
            $table->enum('accredited_to_deped', ['yes', 'no'])->default('yes');
            $table->text('description')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('schools');
    }
};
