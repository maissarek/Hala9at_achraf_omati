<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Halaka extends Model
{
    use HasFactory;
    public $timestamps=false;
    use SoftDeletes;
protected   $table= 'halaka';

      protected $dates = ['deleted_at'];
protected  $fillable=[
'id',
'name',
'id_lieu',
'jour',
'tempsDebut',
'tempsFin',
'fiaMin',
'fiaMax',
'id_groupe','khatimat'];

public function groupe(){

return $this->belongToMany(Group::class);

}


public function lieu(){

return $this->belongToMany(Lieu::class);

}


 public function  ensetuhlk(){

return $this->belongsToMany(Ensetuhlk::class);
        
}

}
