@extends('layouts.app')



@section('content')

<h1>View and edit teams</h1>

<!-- <div class="container"> -->
<div class="row col-container">
    <div class="col col-md-6">
        <table id="teams_table" class="display">
            <thead>
                <tr>
                    <!-- <th>Edit</th> -->
                    <th>Name</th>
                    <!-- <th>Season</th> -->
                </tr>
            </thead>
            <!-- <tbody>
                @forelse ($teams as $team)

                <tr>
                    <td>
                        <a href="{{ route('teams.edit', $team->id) }}">
                            Edit
                        </a>
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->season }}</td>
                </tr>

                @empty
                <p>There are no teams to display!</p>
                @endforelse
            </tbody> -->
        </table>
    </div>
    <!-- <div class="col-md-6 col">
        <table id="active_people_table" class="display">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Team</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Type</th>
                </tr>
            </thead> -->
            <!-- <tbody>
            @forelse ($active_people as $active_person)

                <tr>
                    <td>
                        <a href="{{ route('teams.edit', $team->id) }}">
                            Edit
                        </a>
                    </td>
                    <td>{{ $active_person->team_id }}</td>
                    <td>{{ $active_person->first_name }}</td>
                    <td>{{ $active_person->last_name }}</td>
                    <td>{{ $active_person->type }}</td>
                </tr>

            @empty
            <p>There are no teams to display!</p>
            @endforelse
        </tbody> -->
        </table>

    </div>
</div>
<!-- </div> -->
@stop

@push('scripts')
<script>
$(function () {
    $('#teams_table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/eloquent/array-data'
        });
    });


</script>
@endpush
<!-- $(document).ready(function () {
    $('#active_people_table').DataTable({
        select: {
            style: 'single',
            selector: 'tr',
        },
    });
}); -->