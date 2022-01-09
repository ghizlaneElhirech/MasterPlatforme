<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    public $translatable = ['name']; 

    protected $fillable = ['name','semestre_id','teacher_id'];
 

    // جلب اسم المراحل الدراسية

    public function semestre()
    {
        return $this->belongsTo('App\Semestre', 'semestre_id');
    }

   

    // جلب اسم المعلم
    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'teacher_id');
    }
     public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

}
