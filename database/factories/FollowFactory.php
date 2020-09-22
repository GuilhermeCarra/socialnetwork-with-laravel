<?php

namespace Database\Factories;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FollowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Follow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_1' => $this->faker->unique()->numberBetween($min = 1, $max = 10),
            'user_2' => $this->faker->unique()->numberBetween($min = 11, $max = 20),
            'status' => $this->faker->numberBetween(0,2)
        ];
    }
}

