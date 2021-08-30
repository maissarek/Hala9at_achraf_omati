<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensetuhlk extends Model
{
    use HasFactory;
protected $table="ensetuhlk";
protected $fillable= ['id_ens','id_etud','id_hlk'];

}
