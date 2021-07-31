<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personne extends Model
{
    use HasFactory;
$table->integer('id')->primary();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->date('dateNaiss');
            $table->string('adresse', 1000);
            $table->integer('telephone');
            $table->string('email', 50);
            $table->string('fonction', 500);
            $table->string('niveauScolaire', 50);
            $table->date('dateEntree');
}
