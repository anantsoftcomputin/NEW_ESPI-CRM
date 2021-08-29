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
        'added_by'
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
        return $this->hasOne(Course::class,'id','course_id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
