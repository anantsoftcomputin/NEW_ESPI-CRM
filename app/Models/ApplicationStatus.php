<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationStatus extends Model
{
    use HasFactory,SoftDeletes;

    public function Country()
    {
        return $this->belongsTo(Country::class,'countries_id','id');
    }
}
