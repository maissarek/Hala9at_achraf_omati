<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;


    protected $guarded = [];
    public function permissions(){
        return $this->belongsToMany(Permission::class)
    }


   /* use SoftDeletes;
    
      protected $dates = ['deleted_at'];
    public $timestamps=false;

protected $table="role";
protected $fillable=['id','libelle'];
*/

}
