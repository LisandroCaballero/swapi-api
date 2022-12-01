<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Vehicles;

class VehiclesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'model' => $this->faker->word,
            'manufacturer' => $this->faker->word,
            'cost_in_credits' => $this->faker->word,
            'length' => $this->faker->word(),
            'max_atmosphering_speed' => $this->faker->word(),
            'crew' => $this->faker->word(),
            'passengers' => $this->faker->word(),
            'cargo_capacity' => $this->faker->word(),
            'consumables' => $this->faker->word(),
            'vehicle_class' => $this->faker->word,
            'pilots' => $this->faker->url,
            'films' => $this->faker->url,
            'url' => $this->faker->url,
        ];
    }
}
