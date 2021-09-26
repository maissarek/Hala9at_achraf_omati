<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Histhalaka extends Model
{
    use HasFactory;
    use SoftDeletes;
    
      protected $dates = ['deleted_at'];
    public $timestamps=false;
protected $table="histhalaka";
protected $fillable=[

'id',
'ensRemplacante',
'date',
'moraja3a',
'moton',
'autres',
'absence_Ens',
'justification_Ens'

];

}
