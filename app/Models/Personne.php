<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personne extends Model
{

use HasFactory;
use SoftDeletes;

      protected $dates = ['deleted_at'];
public $timestamps=false;
//const CREATED_AT= 'date_inscription';
protected $table="personne";
protected $fillable = [
'nom',
'prenom',
'dateNaiss',
'adresse',
'telephone',
'email',
'job',
'fonction',
'niveauScolaire',
'statusSocial',
'lieuNaiss',
'dateEntree',
'date_inscription'];

public function Ens_relat()
    {
        return $this->hasOne(Enseigante::class);
    }

public function Etu_relat()
    {
        return $this->hasOne(Etudiante::class);
    }

public function user_relat()
    {
        return $this->hasOne(User::class);
    }
}
