<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'BA Hons Animation',
            'course_level' => 'post-graduate',
            'university_id' => '1',
            'added_by' => 1,
            'company_id' => '1',
        ]);
    }
}
