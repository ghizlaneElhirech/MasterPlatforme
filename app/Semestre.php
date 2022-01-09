<?php

namespace Semestre;
namespace App;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\User;
  
 

class Semestre extends Model  
{
 
    use HasTranslations;
    public $translatable = ['semestre_name'];
    protected $fillable=['semestre_name'];
    protected $table = 'semestres';
    public $timestamps = true;

} 