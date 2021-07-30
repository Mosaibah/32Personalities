<?php

namespace Database\Factories;

use App\Models\Allowance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllowanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Allowance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'amount' => $this->faker->numberBetween($min = 100, $max = 600)
        ];
    }
}
