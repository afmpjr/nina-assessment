<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->dateTimeBetween('- 50 years', '- 18 years'),
            'gender' => $this->faker->randomElement(['male', 'female', 'non binary']),
            'location' => $this->faker->country,
            'religion' => $this->faker->optional()->randomElement(['Christianity', 'Islam', 'Judaism', 'Buddhism', 'Other']),
            'personalities' => [
                'introverted' => $this->faker->numberBetween(0, 10),
                'extroverted' => $this->faker->numberBetween(0, 10),
                'patient' => $this->faker->numberBetween(0, 10),
                'impatient' => $this->faker->numberBetween(0, 10),
            ],
            'dietary_wishes' => $this->faker->optional()->sentence,
            'allergies' => $this->faker->optional()->sentence,
            'language_proficiencies' => [
                'English' => $this->faker->numberBetween(0, 10),
                'Portuguese' => $this->faker->numberBetween(0, 10),
                'Spanish' => $this->faker->numberBetween(0, 10),
                'French' => $this->faker->numberBetween(0, 10),
                'Dutch' => $this->faker->numberBetween(0, 10),
            ],
        ];
    }
}
