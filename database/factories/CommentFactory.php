<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = Post::inRandomOrder()->limit(1)->get();
        $user = User::inRandomOrder()->limit(1)->get();

        return [
            'content' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'user_id' => $user[0]->id,
            'post_id' => $post[0]->id,
            'created_at' => $post[0]->created_at,
            'updated_at' => $post[0]->created_at,
        ];
    }
}