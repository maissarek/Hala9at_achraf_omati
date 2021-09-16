<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseigante extends Model
{
    use HasFactory;
    public $timestamps=false;
   protected $table='enseigante';
   protected $fillable= [
   'id',
   'experienceTeaching',
   'lieuKhatm',
   'dateKhatm',
   'ensKhatm',
   'Remplace',
   'Rempl_day',
   'personne_id'
   ];

   public function personne()
   {
   return $this->belongsTo(Personne::class);
   }
}
