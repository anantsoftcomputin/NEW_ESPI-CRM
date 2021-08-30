<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use File;

class CountrySeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/countries.json");
        $countries = json_decode($json);

        foreach ($countries as $key => $value) {
            Country::create([
                "name" => $value->name,
                "shortname" => $value->sortname,
                "phonecode" => $value->phonecode,
            ]);
        }

        // Country::create([
        //     "name" => 'india',
        //     "shortname" => 'IN',
        //     "phonecode" => '91',
        // ]);
        // Country::create([
        //     "name" => 'usa',
        //     "shortname" => 'IN',
        //     "phonecode" => '91',
        // ]);

        // Country::create([
        //     "name" => 'uk',
        //     "shortname" => 'IN',
        //     "phonecode" => '91',
        // ]);

        // Country::create([
        //     "name" => 'uk',
        //     "shortname" => 'IN',
        //     "phonecode" => '91',
        // ]);

    }
}
