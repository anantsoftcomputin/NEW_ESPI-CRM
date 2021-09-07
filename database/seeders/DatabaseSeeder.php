<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        $this->call(CountrySeed::class);
        $this->call(StateSeed::class);
        $this->call(CitySeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(IntactSeeder::class);
        $this->call(RolePermissionSeeder::class);
    }
}
