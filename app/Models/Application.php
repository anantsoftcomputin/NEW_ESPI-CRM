<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'enquiry_id',
        'course_id',
        'intact_year_id',
        'intact_month_id',
        'added_by_id',
        'application_id',
        'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }


    public function University()
    {
        return $this->hasOne(University::class,'id','university_id');
    }

    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class,'enquiry_id');
    }

    public function Course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
}
