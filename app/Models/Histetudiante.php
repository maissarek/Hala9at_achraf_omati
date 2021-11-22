<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Histetudiante extends Model
{
    use HasFactory;
    use SoftDeletes;
    
      protected $dates = ['deleted_at'];
    public $timestamps=false;
 protected $table ='histetudiante';
protected $fillable=[
'id','HistHalaka',
'ensEtudHlk_id','hizb',
'elhifd','Elmorajaa','Elmtn',
'retard','absent',
'justificatif','observations']; 

}
