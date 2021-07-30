<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
   protected $table="Compte";
protected $fillable= ['id','personne_id','username','password','dateCreation','etat']
}