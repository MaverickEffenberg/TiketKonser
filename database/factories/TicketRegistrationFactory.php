<?php

namespace Database\Factories;

use App\Models\TicketRegistration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TicketRegistration>
 */
class TicketRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'student_email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('08##########'),
            'ticket_quantity' => fake()->numberBetween(1, 4),
            'ticket_category' => fake()->randomElement(['festival', 'plus']),
        ];
    }
}
