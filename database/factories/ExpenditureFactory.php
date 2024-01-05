<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Expenditure;

class ExpenditureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expenditure::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'currency' => $this->faker->randomElement(["HUF","EUR"]),
            'grossAmount' => $this->faker->numberBetween(0, 1000),
            'type' => $this->faker->randomElement(["infrastructure","personal","legal","overhead","other","tax","marketing"]),
            'description' => $this->faker->realText(200),
            'reference' => $this->faker->realText(30),
            'merchant' => $this->faker->realText(30),
            'paidAt' => $this->faker->dateTimeBetween('-120 days', 'now'),
        ];
    }
}
