<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    
use SoftDeletes;
protected $date = ['deleted_at'];
 protected $guarded = [];
protected $table="permission";
protected $fillable=['id','name'];
}
