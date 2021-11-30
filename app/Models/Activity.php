<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['string','enquiry_id'];

    protected static function booted()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->company_id = \Auth::user()->company_id;
        });

        static::addGlobalScope(new CompanyScope);
    }

    use HasFactory;

    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class,'enq');
    }
}
