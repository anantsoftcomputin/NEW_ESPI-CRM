<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Company::create([
            "name" => 'espi',
            "domain" => 'espiconsultants.com',
            "subdomain" => 'espi',
            "logo" => "default.jpg",
            "email" => "espiconsultants@gmail.com",
            "status" => "active"
        ]);
    }
}
