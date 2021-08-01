<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AccomodationsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
    }
}
