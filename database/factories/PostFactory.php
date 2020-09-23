<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Reaction;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->limit(1)->get();
        $date = $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now');

        return [
            'user_id' => $user[0],
            'description' => $this->faker->realText($maxNbChars = 1000, $indexSize = 2),
            'image' => rand(0, 1) ? $this->faker->imageUrl($width = 640, $height = 480) : null,
            'likes_count' => $this->faker->numberBetween($min = 0, $max = 1500),
            'dislikes_count' => $this->faker->numberBetween($min = 0, $max = 500),
            'comments_count' => $this->faker->numberBetween($min = 0, $max = 150),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }

    public function fixReactionsCount() {
        $posts = Post::pluck('id')->toArray();

        for ($i = 0; $i < count($posts); $i++) {

            $likes = Reaction::where('post_id',$posts[$i])->where('type','like')->count();
            $dislikes = Reaction::where('post_id',$posts[$i])->where('type','dislike')->count();
            $commentsCount = Comment::where('post_id',$posts[$i])->count();

            Post::where('id',$posts[$i])->update(['dislikes_count' => $dislikes, 'likes_count' => $likes, 'comments_count' => $commentsCount]);
        }
    }
}