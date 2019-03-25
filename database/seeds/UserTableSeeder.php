<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0;$i < 111;$i ++) {
            $id_type = rand(0, 2);
            $club_id = null;
            $district_id = null;
            $organization_id = null;
            if ($id_type == 0) {
                $club_id = DB::table('clubs')->inRandomOrder()->first()->id;
            } else if ($id_type == 1) {
                $district_id = DB::table('districts')->inRandomOrder()->first()->id;
            } else {
                $organization_id = DB::table('organizations')->inRandomOrder()->first()->id;
            }
            factory(App\User::class, 1)->create([
                'club_id' => $club_id,
                'district_id' => $district_id,
                'organization_id' => $organization_id,
            ]);
        }
    }
}
