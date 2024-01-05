<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Income;

class IncomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Income::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'currency' => $this->faker->randomElement(["HUF","EUR"]),
            'grossAmount' => $this->faker->numberBetween(0, 1000),
            'description' => $this->faker->text(),
            'reference' => $this->faker->word(),
            'payer' => $this->faker->word(),
            'paidAt' => $this->faker->dateTimeBetween('-120 days', 'now'),
            'invoiceId' => $this->faker->uuid(),
        ];
    }
}
