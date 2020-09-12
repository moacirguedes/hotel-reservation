<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'check_in' => $this->faker->dateTimeBetween('today', '+1 day'),
            'check_out' => $this->faker->dateTimeBetween('next week', 'next month'),
            'total_price' => $this->faker->randomFloat(2, 50, 500),
            'user_id' => User::factory(),
        ];
    }
}
