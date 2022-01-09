<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    use HasTranslations;
    public $translatable = ['Name_Class'];


    protected $table = 'Classrooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','semestre_id'];


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف

    public function semestres()
    {
        return $this->belongsTo('App\Semestre', 'semestre_id');
    }

}