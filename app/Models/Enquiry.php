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
        'passport_number',
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
        'middle_name',
        'passport_no',
        'passport_image',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    public function setAddedByIdAttribute()
    {
        $this->attributes['added_by_id'] = Auth::user()->id;
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
        return $this->belongsTo(User::class,'counsellor_id');
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
        //return $this->hasMany(Comment::class)->whereNull('parent_id');
    }



}
