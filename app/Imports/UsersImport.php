<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\University;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class UsersImport implements ToModel,WithHeadingRow,WithUpserts,WithUpsertColumns,WithChunkReading
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
        $university = University::firstOrCreate(array('name' => $row['university_id'],'added_by' => 1 , 'country_id' => '230' , 'company_id' => 1));
        return new Course([
            'name'     => $row['name'],
            'company_id'     => $row['company_id'],
            'university_id'     => $university->id,
            'course_level'     => $row['course_level'],
            'added_by'     => $row['added_by'],
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
