<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Intact;
use App\Models\University;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $data;
    public function model(array $row)
    {
        return $row;
        die();
        $intake_year = Intact::where('year',$row['intake_year'])->first();
        $intake_month = Intact::firstOrNew(array('month' => $row['intake_month']));
        $university = University::firstOrNew(array('name' => $row['university']));
        $university->address="";
        $university->email="";
        $university->status="active";
        $university->added_by='1';
        $university->country_id='230';
        $university->company_id='1';
        $university->save();
        $course=Course::firstOrNew(array('name'=>$row['course_name']));
        $course->university_id=$university->id;
        $course->course_level=$row['course_level'] ?? "";
        $course->status="active";
        $course->specialization=$row['specialization'] ?? '';
        $course->duration=$row['duration'] ?? "";
        $course->application_fees=$row['application_fees'] ?? '';
        $course->course_link=$row['course_link'];
        $course->intake_year=$intake_year->id;
        $course->intake_month=$intake_month->id;

        $course->added_by='1';
        $course->company_id='1';
        $course->save();
        return $course;
    }

}
