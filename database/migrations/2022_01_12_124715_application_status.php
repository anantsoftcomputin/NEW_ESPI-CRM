<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicationStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_statuses', function (Blueprint $table) {
            $table->string('status');
            $table->integer('seq')->default(0);
            $table->foreignId('countries_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_statuses', function (Blueprint $table) {
             $table->dropColumn('status');
             $table->dropColumn('seq');
        });
    }
}
