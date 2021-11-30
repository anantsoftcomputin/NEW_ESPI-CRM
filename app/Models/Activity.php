<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class,'enq');
    }
}
