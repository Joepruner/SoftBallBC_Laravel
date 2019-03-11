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
        $this->call(UserTableSeeder::class);
        $this->call(OrganizationTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(ClubTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(ActivePeopleTableSeeder::class);
    }
}
