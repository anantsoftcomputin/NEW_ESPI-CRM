<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['string'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
            $model->company_id = Auth::user()->company_id;
        });
    }

    public function Sender()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function child()
    {
        return $this->hasMany($this, 'parent_id');
    }

}
