<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::create([
            'name' => 'Anglia Ruskin University',
            'description' => 'Anglia Ruskin University is a public university in East Anglia, United Kingdom. It has its origins in the Cambridge School of Art, founded by William John Beamont in 1858. It became a university in 1992 and was renamed after John Ruskin in 2005. It is one of the post-1992 universities.',
            'address' => 'Cambridge Campus, East Rd, Cambridge CB1 1PT, United Kingdom',
            'phone' => '+44 (0)1245 493131',
            'email' => 'admin@espi.com',
            'country_id' => '1',
            'company_id' => '1',
            'added_by' => 1,
        ]);

        // Country::create([
        //     "name" => 'india',
        //     "shortname" => 'IN',
        //     "phonecode" => '91',
        // ]);
    }
}
