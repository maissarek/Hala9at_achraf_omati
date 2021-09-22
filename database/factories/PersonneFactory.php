<?php

namespace Database\Factories;

use App\Models\Personne;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
   'nom'=> $this->faker->name(),
'prenom'=> $this->faker->name(),
'dateNaiss'=> $this->faker->date(),
'adresse'=> $this->faker->text(20),
'telephone'=> $this->faker->numerify('#########'),
'email'=>$this->faker->unique()->safeEmail(),
'job'=> '1',
'fonction'=> $this->faker->text(20),
'niveauScolaire'=> $this->faker->text(20),
'statusSocial'=> $this->faker->text(20),
'lieuNaiss'=> $this->faker->text(20),
'dateEntree'=> $this->faker->date(),
'date_inscription'=> $this->faker->date()
        ];
    }
}
