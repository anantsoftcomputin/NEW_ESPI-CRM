<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailCoulamApprove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enquiry_details', function (Blueprint $table) {
            $table->boolean("is_conform")->default(false);
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->foreign('approve_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enquiry_details', function (Blueprint $table) {
            $table->dropColumn("is_conform");
            $table->dropForeign('approve_by');
            $table->dropColumn('approve_by');
        });
    }
}
