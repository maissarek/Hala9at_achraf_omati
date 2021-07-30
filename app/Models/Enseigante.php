<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseigante extends Model
{
    use HasFactory;
   protected $table="Enseigante";
protected $fillable= ['id','experienceTeaching','lieuKhatm','dateKhatm','ensKhatm','Remplace','Rempl_day']
}
