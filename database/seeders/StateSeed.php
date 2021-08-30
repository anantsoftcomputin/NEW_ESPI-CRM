<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use File;

class StateSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/states.json");
        $states = json_decode($json);

        foreach ($states as $key => $value) {
            State::create([
                "name" => $value->name,
                "country_id" => $value->country_id,
            ]);
        }

        // State::create([
        //     "name" => 'gujarat',
        //     "country_id" => '1',
        // ]);
    }
}
