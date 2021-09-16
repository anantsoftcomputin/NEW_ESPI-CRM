<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportUniversity implements ToCollection
{
    public $data;

    public function collection(Collection $rows)
    {
    }
}
