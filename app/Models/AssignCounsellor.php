<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCounsellor extends Model
{
    use HasFactory;

    protected $fillable= ['enquiry_id','added_by','counsellors_id'];


    public function Detail()
    {
        return $this->belongsTo(User::class,'counsellors_id');
    }

    public function AddedBy()
    {
        return $this->hasOne(User::class,'added_by','id');
    }
}
