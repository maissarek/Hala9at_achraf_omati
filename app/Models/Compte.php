<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compte extends Model
{
    use HasFactory;
    use SoftDeletes;
    
      protected $dates = ['deleted_at'];
    public $timestamps=false;
   protected $table='compte';
protected $fillable= ['id','personne_id','username','password','dateCreation','etat'];
}
