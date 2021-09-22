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
        for($i=1;$i<10;$i++)
        {
            $year=202;
            $year .=$i;
            Intact::create([
                'month' => 'January',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'February',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'March',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'April',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'May',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'June',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'July',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'August',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'September',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'October',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'November',
                'year' => $year,
            ]);
    
            Intact::create([
                'month' => 'December',
                'year' =>$year,
            ]);
        }
        




    }
}
