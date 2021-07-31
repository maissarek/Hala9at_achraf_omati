<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiante extends Model
{
    use HasFactory;
       $table= 'etudiante';
           $fillable= ['id','niveauAhkam','lieuKhatm', 'dateKhatm','ensKhatm', 'teach', 'teachPlace']
}
