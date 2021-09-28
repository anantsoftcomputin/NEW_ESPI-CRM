<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn("d_req_aca_per");
            $table->dropColumn("d_req_aca_gpa");
            $table->dropColumn("d_req_lan_per");
            $table->dropColumn("d_req_lan_gpa");

            $table->dropColumn("g_req_aca_per");
            $table->dropColumn("g_req_aca_gpa");
            $table->dropColumn("g_req_lan_per");
            $table->dropColumn("g_req_lan_gpa");

            $table->dropColumn("pg_req_aca_per");
            $table->dropColumn("pg_req_aca_gpa");
            $table->dropColumn("pg_req_lan_per");
            $table->dropColumn("pg_req_lan_gpa");

            $table->dropColumn("ten_req_aca_per");
            $table->dropColumn("ten_req_aca_gpa");
            $table->dropColumn("ten_req_lan_per");
            $table->dropColumn("ten_req_lan_gpa");

            $table->dropColumn("twelve_req_aca_per");
            $table->dropColumn("twelve_req_aca_gpa");
            $table->dropColumn("twelve_req_lan_per");
            $table->dropColumn("twelve_req_lan_gpa");

            $table->string('ten_req')->nullable();
            $table->string('twelve_req')->nullable();
            $table->string('bachelor_req')->nullable();
            $table->string('master_req')->nullable();

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
