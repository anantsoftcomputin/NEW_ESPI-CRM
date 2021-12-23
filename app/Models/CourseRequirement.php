<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseRequirement extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'course_requirement';

    protected $fillable = [
        'documents',
        'type',
        'status',
        'course_id',
        'company_id',
        'created_at',
        'updated_at',
    ];
}
