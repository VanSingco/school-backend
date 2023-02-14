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
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('ww_min_task')->default(0)->after('pt');
            $table->integer('ww_max_task')->default(0)->after('ww_min_task');
            $table->integer('qa_min_task')->default(0)->after('ww_max_task');
            $table->integer('qa_max_task')->default(0)->after('qa_min_task');
            $table->integer('pt_min_task')->default(0)->after('qa_max_task');
            $table->integer('pt_max_task')->default(0)->after('pt_min_task');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn([
                'ww_min_task',
                'ww_max_task',
                'qa_min_task',
                'qa_max_task',
                'pt_min_task',
                'pt_max_task',
            ]);
        });
    }
};
