<?php

namespace Database\Factories;

use App\Models\Etudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'niveauAhkam'=> $this->faker->text('10'),
       'lieuKhatm'=> $this->faker->text('10'),
       'dateKhatm'=> $this->faker->date(),
       'ensKhatm'=> $this->faker->name(),
       'teach'=> '0',
       'teachPlace'=> $this->faker->text('10'),
       'khatima'=> '1',
       'hizb'=> $this->faker->numerify('##'),
        ];
    }
}
