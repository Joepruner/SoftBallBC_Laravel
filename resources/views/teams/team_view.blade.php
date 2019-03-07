@extends('layouts.app')

<style rel="stylesheet" src="/public/css/team_view.css"></style>

@section('content')

<h1>View and edit teams</h1>

<!-- <div class="container"> -->
<div class="row col-container">
    <div class="col col-md-6">
        <table id="teams_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <!-- <th>Edit</th> -->
                    <th>Id</th>
                    <th>Name</th>

                </tr>
            </thead>

        </table>
    </div>
    <div class="col col-md-6">
            <table id="active_people_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th>Edit</th> -->
                        <th>Team id</th>
                        <th>First name</th>
                        <th>Last name</th>

                    </tr>
                </thead>

            </table>
        </div>
    <!-- </div> -->
    @stop

    @section('scripts')
    <script>
    $(document).ready(function() {
      $('#teams_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('teams.index') }}",
        "columns": [
            { "data": "id"},
            { "data": "name"},
        ],
        select: {
            style: 'single',
            selector: 'tr',
        },
      });
    });

    $(document).ready(function() {
        $('#active_people_table').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('active_people.index') }}",
          "columns": [
              { "data": "team_id"},
              { "data": "first_name"},
              { "data": "last_name"},
          ],
          select: {
            style: 'single',
            selector: 'tr',
        },
        });
      });

   </script>
    @stop
    <!-- $(document).ready(function () {
    $('#active_people_table').DataTable({
        select: {
            style: 'single',
            selector: 'tr',
        },
    });
}); -->