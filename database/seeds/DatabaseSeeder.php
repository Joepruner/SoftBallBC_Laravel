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
        // $this->call(UsersTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(ActivePeopleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
