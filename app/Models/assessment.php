<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'program_link',
        'created_at',
        'updated_at'
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

    public function Enquiry()
    {
        return $this->hasOne(Enquiry::class,'id','enquiry_id');
    }

    public function IntactMonth()
    {
        return $this->hasOne(Intact::class,'id','intact_month_id');
    }

    public function IntactYear()
    {
        return $this->hasOne(Intact::class,'id','intact_year_id');
    }

    public function AddedBy()
    {
        return $this->belongsTo(User::class,'added_by_id');
    }

}
