<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groupe extends Model
{
    use HasFactory;
    use SoftDeletes;
    
      protected $dates = ['deleted_at'];
        public $timestamps=false;
protected   $table= 'groupe';
protected  $fillable= ['id','name'];



}
