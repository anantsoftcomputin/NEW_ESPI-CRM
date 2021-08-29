<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->unique();

            $table->unsignedBigInteger('enquiry_id');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');

            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')->references('id')->on('universities');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedBigInteger('intact_year_id');
            $table->foreign('intact_year_id')->references('id')->on('intacts');

            $table->unsignedBigInteger('intact_month_id');
            $table->foreign('intact_month_id')->references('id')->on('intacts');

            $table->unsignedBigInteger('added_by_id');
            $table->foreign('added_by_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('company_id')->default(1);
            $table->foreign('company_id')->references('id')->on('companies');

            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
