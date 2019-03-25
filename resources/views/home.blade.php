@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="top: 25vh !important; position:relative !important;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{\Auth::user()->first_name}}, You are logged in!
                    <div>
                        <?php $club_id = \Auth::user()->club_id;
                              $district_id = DB::table('clubs')->select('district_id')
                              ->where('id', '=', $club_id)->get()[0]->district_id;
                              $organization_id = DB::table('districts')->select('organization_id')
                              ->where('id', '=', $district_id)->get()[0]->organization_id;
                        ?>
                        @if ($club_id != null)

                        <?php
                        Session::put('access_level','club');
                        Session::put('access_id', $club_id);
                        Session::put('access_level_name', DB::table('clubs')->select('name')
                        ->where('id', '=', $club_id)->get()[0]->name)
                        ?>

                        <div><h4>You are affiliated with the </h4>
                            <h2><a>{{  DB::table('clubs')->select('name')
                                ->where('id', '=', $club_id)->get()[0]->name}}
                            club</a></h2>
                        <h4>within the</h4>
                        <h2>{{ DB::table('districts')->select('name')
                            ->where('id', '=', $district_id)->get()[0]->name }} district</h2>
                                <h4>suported by the</h4>
                        <h2>{{ DB::table('organizations')->select('name')
                                ->where('id', '=', $organization_id)->get()[0]->name }} organization</h2>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
