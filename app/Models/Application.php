<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

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
}
