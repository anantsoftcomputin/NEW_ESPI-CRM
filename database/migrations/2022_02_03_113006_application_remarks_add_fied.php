<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicationRemarksAddFied extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_remarks', function (Blueprint $table) {
            $table->date('start_date')->nullable();
            $table->date('completed_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_remarks', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('completed_date');
        });
    }
}
