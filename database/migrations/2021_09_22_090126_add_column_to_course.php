<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string("d_req_aca_per")->nullable();
            $table->string("d_req_aca_gpa")->nullable();
            $table->string("d_req_lan_per")->nullable();
            $table->string("d_req_lan_gpa")->nullable();

            $table->string("g_req_aca_per")->nullable();
            $table->string("g_req_aca_gpa")->nullable();
            $table->string("g_req_lan_per")->nullable();
            $table->string("g_req_lan_gpa")->nullable();

            $table->string("pg_req_aca_per")->nullable();
            $table->string("pg_req_aca_gpa")->nullable();
            $table->string("pg_req_lan_per")->nullable();
            $table->string("pg_req_lan_gpa")->nullable();

            $table->string("ten_req_aca_per")->nullable();
            $table->string("ten_req_aca_gpa")->nullable();
            $table->string("ten_req_lan_per")->nullable();
            $table->string("ten_req_lan_gpa")->nullable();

            $table->string("twelve_req_aca_per")->nullable();
            $table->string("twelve_req_aca_gpa")->nullable();
            $table->string("twelve_req_lan_per")->nullable();
            $table->string("twelve_req_lan_gpa")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}
