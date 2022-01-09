<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'teacher_id');
    }



    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }


    public function semestre()
    {
        return $this->belongsTo('App\Semestre', 'semestre_id');
    }


   
}