<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            $organization_id = DB::table('organizations')
            ->inRandomOrder()
            ->first()
            ->id;
            factory(App\District::class, 1)->create([
                'organization_id' => $organization_id,
            ]);
        }
    }
}
