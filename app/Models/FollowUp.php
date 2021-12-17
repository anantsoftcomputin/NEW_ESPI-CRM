<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;


    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class,'enquiry_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'assist_by');
    }

    public function getAddedByAttribute()
    {
        return Ucfirst($this->User->name);
    }

}
