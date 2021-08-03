<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histhalaka extends Model
{
    use HasFactory;

protected $table="histhalaka";
protected $fillable=['ensRemplacante','date','moraja3a','moton','autres','absence_Ens','justification_Ens']

}
