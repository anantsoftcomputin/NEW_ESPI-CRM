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
        'name',
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
        "referance_source",
        "remarks",
        "postal_code",
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

}
