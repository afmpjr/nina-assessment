<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreviousExperience>
 */
class PreviousExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'type' => $this->faker->randomElement(['self-employed', 'freelancer', 'employee', 'volunteer']),
            'title' => $this->faker->jobTitle,
            'organization' => $this->faker->company,
            'start_date' => $this->faker->dateTimeBetween('- 5 years', '- 1 year'),
            'end_date' => $this->faker->optional()->dateTimeBetween('- 1 year', 'now'),
            'description' => $this->faker->optional()->paragraph(),
        ];
    }
}
