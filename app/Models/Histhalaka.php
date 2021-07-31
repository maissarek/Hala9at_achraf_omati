<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histhalaka extends Model
{
    use HasFactory;
$table->integer('id')->primary();
            $table->integer('ensRemplacante')->index('ensRemplacante');
            $table->date('date');
            $table->string('moraja3a', 100);
            $table->string('moton', 500);
            $table->string('autres', 5000);
            $table->string('absence_Ens', 10);
            $table->string('justification_Ens',
}
