<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensetuhlk extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $table="ensetudhlk";
protected $fillable= ['id','id_ens','id_etud','id_hlk'];

}
