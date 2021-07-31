<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histetudiante extends Model
{
    use HasFactory;
$table->integer('id')->primary();
            $table->integer('HistHalaka')->index('HistHalaka');
            $table->integer('ensEtudHlk_id')->index('ensEtudHlk_id');
            $table->integer('hizb');
            $table->string('surat', 50);
            $table->integer('aya_d');
            $table->integer('aya_f');
            $table->integer('mtn_name');
            $table->integer('mtn_num_d');
            $table->integer('mtn_num_f');
            $table->tinyInteger('absent');
            $table->string('justificatif', 500);
            $table->string('observations', 
}
