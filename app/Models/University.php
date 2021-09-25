<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'dob',
        'address',
        'city_id',
        'country_id',
        'state_id',
        'added_by',
        'campus',
        'provision_state',
        'intake_year',
        'intake_month',
        'application_fees',
        'web',
        'news_letter',
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

    public function setImageAttribute($value)
    {
        if(empty($value))
        {
            return "default.jpg";
        }
        else
        {
            return ucfirst($value);
        }
    }

    public function Course()
    {
        return $this->hasMany(Course::class,'id','course_id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }

}
