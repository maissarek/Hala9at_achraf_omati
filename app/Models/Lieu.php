<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lieu extends Model
{
    use HasFactory;
      use HasFactory;
    use SoftDeletes;
    
      protected $dates = ['deleted_at'];
public $timestamps=false;
protected   $table= 'lieu';
protected  $fillable= ['id','name'];
}
