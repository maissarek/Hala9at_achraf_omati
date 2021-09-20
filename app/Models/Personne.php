<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personne extends Model
{

use HasFactory;
use SoftDeletes;
public $timestamps=false;
protected $table="personne";
protected $fillable = [
'nom',
'prenom',
'dateNaiss',
'adresse',
'telephone',
'email',
'fonction',
'niveauScolaire',
'dateEntree'];

public function Ens_relat()
    {
        return $this->hasOne(Enseigante::class);
    }

public function Etu_relat()
    {
        return $this->hasOne(Etudiante::class);
    }

}
