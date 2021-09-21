<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsUniversity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->string("campus")->nullable();
            $table->string("provision_state")->nullable();
            $table->string("intake_year")->nullable();
            $table->string("intake_month")->nullable();
            $table->string("news_letter")->nullable();
            $table->string("application_fees")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('universities', function (Blueprint $table) {
            //
        });
    }
}
