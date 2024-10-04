<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => ((rand(0, 100) >= 20) ? User::inRandomOrder()->first()->id : null),
            'date' => fake()->unique()->dateTimeBetween('now', Carbon::now()->addYear()),
            'is_confirmed' => rand(0,1),
        ];
    }
}
