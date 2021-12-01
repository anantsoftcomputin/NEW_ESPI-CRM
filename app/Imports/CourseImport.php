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

        $intake_year = Intact::firstOrNew(array('year' => $row['intake_year']));
        $intake_month = Intact::firstOrNew(array('month' => $row['intake_month']));
        $university = University::firstOrNew(array('name' => $row['university']));
        return $row;
                // $university->address="";
                // $university->email="";
                // $university->status="active";
                // $university->added_by=\Auth::user()->id;
                // $university->country_id=101;
                // $university->company_id=\Auth::user()->company_id;
                // $university->save();

                // $course=Course::firstOrNew(array('name'=>$request->course_name[$i]));
                // $course->university_id=$university->id;
                // $course->course_level=$request->course_level[$i] ?? "";
                // $course->status="active";
                // $course->specialization=$request->specialization[$i];
                // $course->duration=$request->duration[$i];
                // $course->application_fees=$request->application_fees[$i];
                // $course->course_link=$request->course_link[$i];
                // $course->intake_year=$intake_year->id;
                // $course->intake_month=$intake_month->id;

                // $course->ten_req=$request->ten_req[$i];
                // $course->twelve_req=$request->twelve_req[$i];
                // $course->bachelor_req=$request->bachelor_req[$i];
                // $course->master_req=$request->master_req[$i];

                // $course->added_by=\Auth::user()->id;
                // $course->company_id=\Auth::user()->company_id;
                // $course->save();
                //return Excel::all();
    }

}
