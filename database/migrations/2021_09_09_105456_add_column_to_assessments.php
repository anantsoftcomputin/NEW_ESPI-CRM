<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToAssessments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->string("specialization")->nullable();
            $table->string("program_link")->nullable();
            $table->string("level")->nullable();
            $table->string("duration")->nullable();
            $table->string("campus")->nullable();
            $table->string("entry_req")->nullable();
            $table->string("app_fee")->nullable();
            $table->string("app_deadline")->nullable();
            $table->string("tution_fee")->nullable();
            $table->string("scholarship")->nullable();
            $table->string("remarks")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assessments', function (Blueprint $table) {
            //
        });
    }
}
