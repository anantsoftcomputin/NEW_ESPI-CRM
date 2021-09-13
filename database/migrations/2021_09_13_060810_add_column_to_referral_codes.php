<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToReferralCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_codes', function (Blueprint $table) {
            $table->string("reference_code")->nullable();
            $table->string("reference_name")->nullable();
            $table->string("reference_phone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referral_codes', function (Blueprint $table) {
            //
        });
    }
}
