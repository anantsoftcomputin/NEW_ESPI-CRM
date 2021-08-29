<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->boolean('status')->default(true);
            $table->foreign('company_id')->references('id')->on('companies');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users');
        });

        DB::table('users')->insert(
            array(
                'name' => 'Jasmin Shukla',
                'email' => 'admin@gmail.com',
                'phone' => '7096111131',
                'status' => true,
                'remember_token' => \Carbon\Carbon::now(),
                'password' => '$2y$10$s0vOfzyDAM7W/pQOSMBgvuCshx3yQtkoKmSWrF7f/Sest43T1ZoPy'
                // Pa$$w0rd!
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
