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
protected  $fillable=
['id','name','id_lieu','jour','tempsDebut','tempsFin','fiaMin','fiaMax','id_groupe'];

public function groupe(){

return $this->belongToMany(Group::class);

}

 public function  save_hlk_group_ens(Request $request){

         $hlk= Halaka::create($request->all());
         
        
        // $ens = ::create($request->all());
         $personne->Ens_relat()->save($ens);
          return response([$personne,$ens],201);

       
 }
}
