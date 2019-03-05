@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/public/css/team_view.css') }}">
@stop
@section('scripts')
<script>
    $(document).ready(function () {
        $('#teams_table').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#active_people_table').DataTable();
    });
</script>
@stop

@section('content')

<h1>View and edit teams</h1>

<!-- <div class="container"> -->
<div class="row col-container">
    <div class="col col-md-6">
        <table id="teams_table" class="display">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Name</th>
                    <th>Season</th>
                </tr>
            </thead>
            @forelse ($teams as $team)
            <tbody>
                <tr>
                    <td>
                        <a href="{{ route('teams.edit', $team->id) }}">
                            Edit
                        </a>
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->season }}</td>
                </tr>
            </tbody>
            @empty
            <p>There are no teams to display!</p>
            @endforelse
        </table>
    </div>
    <div class="col-md-6 col" >
        <table id="active_people_table" class="display">
            <thead>
                <tr>
                    <th>Team</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Type</th>
                </tr>
            </thead>
            @forelse ($active_people as $active_person)
            <tbody>
                <tr>
                    <!-- <td>
                        <a href="{{ route('teams.edit', $team->id) }}">
                            Edit
                        </a>
                    </td> -->
                    <td>{{ $active_person->team_id }}</td>
                    <td>{{ $active_person->first_name }}</td>
                    <td>{{ $active_person->last_name }}</td>
                    <td>{{ $active_person->type }}</td>
                </tr>
            </tbody>
            @empty
            <p>There are no teams to display!</p>
            @endforelse
        </table>

    </div>
</div>
<!-- </div> -->
@stop