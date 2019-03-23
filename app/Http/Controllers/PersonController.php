<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use App\ActivePerson;
use DB;
use Yajra\DataTables\DataTables;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\Scheduling\Event;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('active_people')
            ->rightJoin('people', 'active_people.person_id', '=', 'people.id')
            ->where('active_people.person_id','=', null)
            ->get();

        return DataTables::of($query)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $active_people = ActivePerson::all();
        $people = Person::all();

        return view('people.all_people_view', compact('active_people','people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $id)
    {
        $person_id = $id->input('pid');
        $person =  DB::table('people')->where('id',$person_id)->first();
        return view('people.person_edit', compact('person'));
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
        $person = \App\Person::find($id);
        $person->update($request->all());
        return back()->with('success','Inactive person updated successfully!');
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
