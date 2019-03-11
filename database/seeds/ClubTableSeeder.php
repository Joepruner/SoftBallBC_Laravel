<?php

use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $district_id = DB::table('districts')
            ->inRandomOrder()
            ->first()
            ->id;
            factory(App\Club::class, 1)->create([
                'district_id' => $district_id,
            ]);
        }
    }
}
