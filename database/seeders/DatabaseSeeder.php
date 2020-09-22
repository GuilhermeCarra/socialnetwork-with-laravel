<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Follow;

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

        User::factory(200)->create();
        Follow::factory(2500)->create();
    }
}
