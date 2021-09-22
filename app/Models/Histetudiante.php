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
protected $fillable=['id','HistHalaka','ensEtudHlk_id','hizb','surat','aya_d','aya_f','mtn_name','mtn_num_d','mtn_num_f','absent','justificatif','observations']; 

}
