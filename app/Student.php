<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];
 

    public function gender() 
    {
        return $this->belongsTo('App\Gender', 'gender_id');
    }

   

    public function semestre()
    {
        return $this->belongsTo('App\Semestre', 'semestre_id');
    }


      public function attendance()
    {
        return $this->hasMany('App\Attendance', 'student_id');
    }
   

   public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function Nationality()
    {
        return $this->belongsTo('App\Nationalitie', 'nationalitie_id');
    }

}
