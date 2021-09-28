<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_level',
        'university_id',
        'company_id',
        'added_by',
        'duration',
        'course_link',
        'application_fees',
        'ten_req',
        'twelve_req',
        'bachelor_req',
        'master_req',
    ];

    public function University()
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
