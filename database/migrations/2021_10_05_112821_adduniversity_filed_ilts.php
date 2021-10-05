<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdduniversityFiledIlts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->string('ists_req')->nullable();
            $table->string('toefl_req')->nullable();
            $table->string('duolingo_req')->nullable();
            $table->string('pte_req')->nullable();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->string('ists_req')->nullable();
            $table->string('toefl_req')->nullable();
            $table->string('duolingo_req')->nullable();
            $table->string('pte_req')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
