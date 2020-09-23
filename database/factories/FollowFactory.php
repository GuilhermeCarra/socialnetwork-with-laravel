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
            $user1 = $users[0]->id;
            $user2 = $users[1]->id;
        } while (array_search([$user1,$user2],$GLOBALS['followsArray'])) ;

        array_push($GLOBALS['followsArray'], [$user1,$user2]);

        return [
            'follower' => $user1,
            'followed' => $user2,
        ];
    }
}

