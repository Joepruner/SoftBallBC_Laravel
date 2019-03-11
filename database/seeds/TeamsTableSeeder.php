<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {
            $club_id = DB::table('clubs')->inRandomOrder()->first()->id;
            factory(App\Team::class, 1)->create([
                'club_id' => $club_id,
            ]);
        }
    }
}

