<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class ApplicationFollowUps extends Model
{
    use HasFactory;

    public function Application()
    {
        return $this->belongsTo(Application::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class,'assist_by','id');
    }
}
