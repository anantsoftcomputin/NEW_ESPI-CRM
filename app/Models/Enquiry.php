<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'address',
        'city_id',
        'country_id',
        'state_id',
        'counsellor_id',
        'added_by_id',
        'reference_source',
        'remarks',
        'postal_code',
        'preferred_country',
        'enquiry_id',
        'reference_phone',
        'reference_code',
        'reference_name',
        'name',
        'gender',
        'middle_name',
        'passport_no',
        'education',
        'alternate',
        'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    public function City()
    {
        return $this->hasOne(City::class,'id','city_id');
    }

    public function State()
    {
        return $this->hasOne(State::class,'id','state_id');
    }

    public function Country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function Counsellor()
    {
        return $this->hasMany(AssignCounsellor::class);
    }

    public function Details()
    {
        return $this->hasOne(EnquiryDetail::class);
    }

    public function Application()
    {
        return $this->hasMany(Application::class);
    }

    public function Assessment()
    {
        return $this->hasMany(assessment::class);
    }

    public function Comments()
    {
        return $this->Comment()->whereNull('parent_id');
    }


    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }

    // public function getCreatedAtAttribute($date)
    // {
    //     return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    public function Documents()
    {
        return $this->hasMany(Document::class);
    }

    public function Activity()
    {
        return $this->hasMany(Activity::class)->orderBy('id','desc');
    }

    public function FollowUp()
    {
        return $this->hasMany(FollowUp::class)->orderBy('id','desc');
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class)->orderBy('id','desc');
    }
    public function TransactionCredit()
    {
        return $this->hasMany(TransactionCredit::class)->orderBy('id','desc');
    }

    public function ExamDetail()
    {
        return $this->hasMany(EnquiryOnlineExam::class)->orderBy('id','desc');
    }
    public function University()
    {
        return $this->hasOne(University::class,'id','university_id');
    }

}
