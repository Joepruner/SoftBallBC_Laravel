<?php

// use App\ActivePerson;
use Illuminate\Database\Seeder;

class ActivePeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = DB::table('people')->inRandomOrder()->take(50)->get();


        foreach ($people as $person) {
            $randomTeam = DB::table('teams')
            ->inRandomOrder()
            ->first();
            $activepeople = factory(\App\ActivePerson::class, 1)->create([
                'person_id' => $person->id,
                'team_id' => $randomTeam->id,
                'first_name' => $person->first_name,
                'last_name' => $person->last_name,
                'birth_date' => $person->birth_date,
                'membership_id' => $person->membership_id,
                'email' => $person->email,
                'phone' => $person->phone,
                'address_line_1' => $person->address_line_1,
                'address_line_2' => $person->address_line_2,
                'city' => $person->city,
                'province' => $person->province,
                'zip_code' => $person->zip_code,
                'country' => $person->country,

            ]);
        }
    }
}
