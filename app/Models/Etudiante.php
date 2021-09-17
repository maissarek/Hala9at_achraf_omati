<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiante extends Model
{
    use HasFactory;
    public $timestamps=false;
      protected   $table='etudiante';
      protected  $fillable= [
       'id',
       'niveauAhkam',
       'lieuKhatm',
       'dateKhatm',
       'ensKhatm',
       'teach',
       'teachPlace',
       'hizb','personne_id'
       ];

         public function personne()
   {
   return $this -> belongsTo(Personne::class);
   }

   public function getEnsetuhlk()
   {
   return $this -> belongsTo(Ensetuhlk::class);
   } 
    
}
