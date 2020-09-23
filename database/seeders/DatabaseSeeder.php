<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(!isset($GLOBALS['followsArray'])) $GLOBALS['followsArray']= array();
        if(!isset($GLOBALS['reactionsArray'])) $GLOBALS['reactionsArray']= array();

        print 'Generating users...' . PHP_EOL;
        User::factory(200)->create();

        print 'Generating follows...' . PHP_EOL;
        Follow::factory(2500)->create();

        print 'Generating posts...' .PHP_EOL ;
        Post::factory(1000)->create();

        print 'Generating posts reactions...' . PHP_EOL;
        Reaction::factory(2500)->create();

        print 'Generating posts comments...' . PHP_EOL;
        Comment::factory(2500)->create();

        print 'Fixing likes, dislikes and comments counts...' . PHP_EOL;
        Post::factory()->fixReactionsCount();
    }
}
