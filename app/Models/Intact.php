<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intact extends Model
{
    use HasFactory;

    protected $fillable=['year'];

    public function scopeIdDescending($query)
    {
            return $query->orderBy('id','DESC');
    }
}
