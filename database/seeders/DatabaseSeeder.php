<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Reaction;

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

        //User::factory(200)->create();
        //Follow::factory(2500)->create();
        //Post::factory(1000)->create();
        //Reaction::factory(1000)->create();
        //Post::factory()->fixReactionsCount();
    }
}
