<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryDetail extends Model
{
    use HasFactory;

    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class,'enquiry_id','id');
    }
}
