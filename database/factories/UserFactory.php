<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'date_of_birth' => $this->faker->dateTimeBetween('- 80 years', '- 18 years'),
            'gender' => $this->faker->randomElement(['man', 'woman', 'non binary']),
            'location' => $this->faker->city(),
            'religion' => $this->faker->optional()->randomElement(['Christianity', 'Islam', 'Judaism', 'Buddhism', 'Other']),
            'personalities' => json_encode($this->faker->optional()->randomElement(['Introversion', 'Sensing', 'Thinking', 'Judging'])),
            'dietary_wishes' => json_encode($this->faker->optional()->randomElement(['vegetarian', 'vegan', 'gluten-free', 'pescatarian'])),
            'allergies' => json_encode($this->faker->optional()->randomElement(['Pollen', 'Peanuts ', 'Tree Nuts', 'Shellfish', 'Animal Dander', 'Other'])),
            'language_proficiencies' => [
                'Dutch' => $this->faker->numberBetween(0, 10),
                'English' => $this->faker->numberBetween(0, 10),
                'Portuguese' => $this->faker->numberBetween(0, 10),
                'French' => $this->faker->numberBetween(0, 10),
                'Spanish' => $this->faker->numberBetween(0, 10),
            ],
        ];
    }
}
