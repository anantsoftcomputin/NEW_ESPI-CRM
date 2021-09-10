<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;
class assessment extends Model
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
        'status',
        'type',
        'location',
        'status',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }


    public function University()
    {
        return $this->hasOne(University::class,'id','university_id');
    }

    public function Course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }

    public function User()
    {
        return $this->hasOne(User::class,'id','assign_id');
    }
}