<?php

namespace App\Imports;

use App\Models\Course;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CourseImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $data;
    public function collection(Collection $rows)
    {
    }
   
}
