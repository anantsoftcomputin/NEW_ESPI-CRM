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
        'status',
        'processor_id'
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

    public function FollowUp()
    {
        return $this->FollowUpRow();
    }

    public function LastFollowUp()
    {
        return $this->FollowUpRow()->orderby('id','asc');
    }

    public function FollowUpRow() {
        return $this->hasMany(ApplicationFollowUps::class);
    }

    public function Remarks()
    {
        return $this->hasMany(ApplicationRemark::class);
    }

}
