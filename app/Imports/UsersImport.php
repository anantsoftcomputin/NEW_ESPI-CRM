<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Country;
use App\Models\Course;
use App\Models\Intact;
use App\Models\University;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;


class UsersImport implements ToModel,WithHeadingRow,WithUpserts,WithUpsertColumns,WithChunkReading,WithBatchInserts
{
    public function uniqueBy()
    {
        return 'name';
    }

    public function upsertColumns()
    {
        return ['name'];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $country=Country::where('name',$row['country'])->first();
        $university = University::firstOrCreate(array('name' => $row['university'],'added_by' => \Auth::user()->id ,'country_id'=>$country->id,'company_id' => \Auth::user()->company_id));

        // $data=$this->IntactAdd($row['intake_year'],$university->id,'Y');
        //$data=$this->IntactAdd($row['intake_month'],$university->id,'M');

        //dd($data);
        // $intact=Intact::where('year',);
        return new Course([
            'name'     => $row['course_name'],
            'company_id'     => \Auth::user()->company_id,
            'university_id'     => $university->id,
            'course_level'     => $row['course_level'],
            'duration'     => $row['duration'],
            'course_link'     => $row['course_link'],
            'application_fees'     => $row['application_fees'],
            'specialization'     => $row['specialization'],
            'added_by'     => \Auth::user()->id,
        ]);
    }

    // Action y means year
    // Action M means Month
    public function IntactAdd($string,$university_id,$action='Y')
    {
        $data=explode("###",$string);
        if($action=='Y')
        {
            return $this->prepare_array($data,$university_id,'year');
        }
        else
        {
            return $this->prepare_array($data,$university_id,'month');
        }
    }

    public function prepare_array($data,$university_id,$colum)
    {
        $final_array=array();
        foreach($data as $array_val)
        {
            $intack="";
            $intack=array($colum=>$array_val,'university_id'=>$university_id,'status'=>'active');
            $id=Intact::firstOrCreate($intack);
            array_push($final_array,$id);
        }
        return $final_array;
    }

    public function chunkSize(): int
    {
        return 10;
    }

    public function batchSize(): int
    {
        return 10;
    }

}
