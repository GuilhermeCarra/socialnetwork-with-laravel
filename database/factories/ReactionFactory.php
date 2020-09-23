<?php

namespace Database\Factories;

use App\Models\Reaction;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        do {
            $post = Post::inRandomOrder()->limit(1)->get();
            $user = User::inRandomOrder()->limit(1)->get();
        } while (array_search([$post,$user],$GLOBALS['reactionsArray']));

        array_push($GLOBALS['reactionsArray'], [$post,$user]);

        return [
            'user_id' => $user[0]->id,
            'post_id' => $post[0]->id,
            'type' => $this->faker->randomElement(array('like','like','dislike')),
            'created_at' => $post[0]->created_at,
            'updated_at' => $post[0]->updated_at,
        ];
    }
}