<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=[
        'student_id',
        'semestre_id',
        
        'subject_id',
        'teacher_id',
        
    ];
 } 