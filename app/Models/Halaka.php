<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaka extends Model
{
    use HasFactory;
    public $timestamps=false;
protected   $table= 'halaka';
protected  $fillable= ['id','name','lieu','jour','tempsDebut','tempsFin','fiaMin','fiaMax'];
}
