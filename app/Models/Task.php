<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
       'subject', 'file','start_date','date','Priority','Related','Assignees','Followers','Status','note'
    ];

    public function alluser(){
    	return $this->hasMany(User::class, 'name', 'Assignees');
    }
}
