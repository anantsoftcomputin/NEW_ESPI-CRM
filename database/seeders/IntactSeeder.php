<?php

namespace Database\Seeders;

use App\Models\Intact;
use Illuminate\Database\Seeder;

class IntactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Intact::create([
            'month' => 'January-February',
            'year' => '2021',
        ]);

        Intact::create([
            'month' => 'April-May',
            'year' => '2021',
        ]);

        Intact::create([
            'month' => 'June-July',
            'year' => '2021',
        ]);

        Intact::create([
            'month' => 'August-September',
            'year' => '2021',
        ]);

        Intact::create([
            'month' => 'October-November',
            'year' => '2021',
        ]);




    }
}
