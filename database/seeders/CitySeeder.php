<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // City::create([
        //     'name' => 'name',
        // ]);
        $json = File::get("database/city.json");
        $states = json_decode($json);

        foreach ($states as $key => $value) {
            City::create([
                "name" => $value->name,
                "state_id" => $value->state_id,
            ]);
        }

        // City::create([
        //     "name" => 'jamnagar',
        //     "state_id" => '1',
        // ]);
    }
}
