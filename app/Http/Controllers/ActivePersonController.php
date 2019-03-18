<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ActivePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('active_people');
        return Datatables::of($query)->toJson();
    }



    public function addPersonToTeam(Request $data)
    {
        $person_id = $data->input('pid');
        $team_id = $data->input('tid');

        $person_to_add = DB::table('people')->where('id', $person_id)->first();
        // echo($person_to_add->first_name);

        DB::table('active_people')->insert([
            // ['id' => $person_to_add->id],
            ['first_name' => $person_to_add->first_name,
            'last_name' => $person_to_add->last_name,
            'birth_date' => $person_to_add->birth_date,
            'category' => "tbd",
            'type' => "tbd",
            'membership_id' => $person_to_add->membership_id,
            'email' => $person_to_add->email,
            'phone' => $person_to_add->phone,
            'address_line_1' => $person_to_add->address_line_1,
            'address_line_2' => $person_to_add->address_line_2,
            'city' => $person_to_add->city,
            'province' => $person_to_add->province,
            'zip_code' => $person_to_add->zip_code,
            'country' => $person_to_add->country,
            'person_id' => $person_id,
            'team_id' => $team_id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()]
        ]);

        dd($person_id);
        dd($team_id);
        dd($person_to_add);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removePersonFromTeam(Request $data)
    {
        $active_person_id = $data->input('apid');
        //$person_id = $data->input('pid');

        DB::table('active_people')
        ->where('id', '=', $active_person_id)
        ->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $data)
    {
        $active_person_id = $data->input('apid');
        $active_person =  DB::table('active_people')->where('id',$active_person_id)->first();
        return view('active_people.active_person_edit', compact('active_person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $active_person = \App\ActivePerson::find($id);
        $active_person->update($request->all());
        return back()->with('success','Active person updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
