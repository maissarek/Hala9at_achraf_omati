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
    
   protected $dates = ['deleted_at'];
   protected $table='enseigante';
   protected $fillable= [
   'id',
   'experienceTeaching',
   'lieuKhatm',
   'dateKhatm',
   'ensKhatm',
   'Remplace'
   
   ];

   public function personne()
   {
   return $this->belongsTo(Personne::class);
   }


   public function relationship(){

   return $this->belongsToMany(Ensetuhlk::class);

   }
}
