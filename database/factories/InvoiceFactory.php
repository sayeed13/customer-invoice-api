<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['U', 'P', 'V']);
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 2000),
            'status' => $status,
            'issue_date' => $this->faker->dateTimeThisCentury(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisCentury() : null,
        ];
    }
}
