<?php

namespace Database\Factories;

use App\Models\Halaka;
use Illuminate\Database\Eloquent\Factories\Factory;

class HalakaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Halaka::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name'=> $this->faker->name(),
           'jour'=> $this->faker->date(),
           'tempsDebut'=> $this->faker->time(),
           'tempsFin'=> $this->faker->time(),
           'fiaMin' => $this->faker->numerify('##'),
           'fiaMax'=> $this->faker->numerify('##'),
        ];
    }
}
