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
    public function definition()
    {
        $pet = ['cat', 'dog', 'bird', 'other'];
        $color = ['Red', 'Green', 'Blue'];
        $hobby = ['Swimming', 'Reading', 'Tennis'];
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(),
            'image' => "https://i.pravatar.cc/150?img=" . $this->faker->unique()->numberBetween(1, 20),
            'color' => $color[random_int(0, 2)],
            'hobby' => $hobby[random_int(0, 2)],
            'birth_order' => random_int(0, 3),
            'pet' => $pet[random_int(0, 3)],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
