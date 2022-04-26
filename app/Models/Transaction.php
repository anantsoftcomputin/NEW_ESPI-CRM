<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class,'receive_by');
    }

    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
}
