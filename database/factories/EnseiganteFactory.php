<?php

namespace Database\Factories;

use App\Models\Enseigante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnseiganteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enseigante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
   'experienceTeaching' => $this->faker->text('10'),
   'lieuKhatm'=> $this->faker->text('10'),
   'dateKhatm'=> $this->faker->date(),
   'ensKhatm'=> $this->faker->name(),
        ];
    }
}
