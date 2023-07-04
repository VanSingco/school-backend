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
        Schema::table('lesson_discussions', function (Blueprint $table) {
            $table->integer('order')->default(1)->after('exam_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson_discussions', function (Blueprint $table) {
            $table->dropColumn([
                'order',
            ]);
        });
    }
};
