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
        $users = User::pluck('id')->toArray();
        do {
            $user1 = $this->faker->randomElement($users);
            unset($users[$user1]);
            $user2 = $this->faker->randomElement($users);
            dump($user1);
            dump($user2);
            $response1 = Follow::where('user_1',$user1)->where('user_2',$user2)->first();
            $response2 = Follow::where('user_1',$user2)->where('user_2',$user1)->first();
        } while (array_search([$user1,$user2],$GLOBALS['followsArray'])) ;

        array_push($GLOBALS['followsArray'], [$user1,$user2]);

        return [
            'user_1' => $user1,
            'user_2' => $user2,
            'status' => $this->faker->numberBetween(0,2)
        ];
    }
}

