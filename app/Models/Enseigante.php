<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enseigante extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps=false;
   protected $table='enseigante';
   protected $fillable= [
   'id',
   'experienceTeaching',
   'lieuKhatm',
   'dateKhatm',
   'ensKhatm',
   'Remplace',
   'Rempl_day'
   ];

   public function personne()
   {
   return $this->belongsTo(Personne::class);
   }
}
