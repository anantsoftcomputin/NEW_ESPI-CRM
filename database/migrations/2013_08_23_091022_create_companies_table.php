<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain');
            $table->string('subdomain')->unique();
            $table->string('logo');
            $table->string('email')->unique();
            $table->enum('status',['active','inactive']);
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('companies')->insert(
            array(
                'name' => 'espi',
                'email' => 'admin@gmail.com',
                'domain' => 'espi.com',
                'subdomain' => 'espi-admin',
                'logo' => 'logo.jpg'
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
        Schema::dropIfExists('companies');
    }
}
