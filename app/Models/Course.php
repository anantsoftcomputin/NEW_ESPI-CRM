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
        'd_req_aca_per',
        'd_req_aca_gpa',
        'd_req_lan_per',
        'd_req_lan_gpa',
        'g_req_aca_per',
        'g_req_aca_gpa',
        'g_req_lan_per',
        'g_req_lan_gpa',
        'pg_req_aca_per',
        'pg_req_aca_gpa',
        'pg_req_lan_per',
        'pg_req_lan_gpa',
        'ten_req_aca_per',
        'ten_req_aca_gpa',
        'ten_req_lan_per',
        'ten_req_lan_gpa',
        'twelve_req_aca_per',
        'twelve_req_aca_gpa',
        'twelve_req_lan_per',
        'twelve_req_lan_gpa',
        
    ];

    public function University()
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
