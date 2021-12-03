<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('enquiry_id');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->string('name');
            $table->string('file_name');
            $table->string('type')->default('pdf');
            $table->enum('status',['draft','approved','rejected'])->default('draft');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('added_by');
            $table->foreign('added_by')->references('id')->on('users');
            $table->unsignedBigInteger('reviewer')->nullable();
            $table->foreign('reviewer')->references('id')->on('users');
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
        Schema::dropIfExists('documents');
    }
}
