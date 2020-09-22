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
        do {
            $users = User::inRandomOrder()->limit(2)->get();
            $user1 = $users[0];
            $user2 = $users[1];
        } while (array_search([$user1,$user2],$GLOBALS['followsArray'])) ;

        array_push($GLOBALS['followsArray'], [$user1,$user2]);
        array_push($GLOBALS['followsArray'], [$user2,$user1]);

        return [
            'user_1' => $user1,
            'user_2' => $user2,
            'status' => $this->faker->numberBetween(0,2)
        ];
    }
}

