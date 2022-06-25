<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $appointment = ['phone', 'meeting'];
        $booking_time = ['9:00', '10:00', '11:00', '12:00'];
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->safeEmail(),
            "phone" => $this->faker->phoneNumber(),
            "appointment_method" => $appointment[random_int(0, 1)],
            "message" => $this->faker->paragraph(),
            "counsellor_id" => random_int(1, 20),
            "booking_date" => now()->toDateString(),
            "booking_time" => $booking_time[random_int(0, 3)]
        ];
    }
}
