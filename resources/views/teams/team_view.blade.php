
@extends('layouts.app')
<style rel="stylesheet" src="/public/css/team_view.css"></style>
<style>
    .dataTables_wrapper .dt-buttons {
        float:right;
    }
</style>
@section('content')

<h1>Manage teams</h1>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
    <div class="row col-container">
        <div class="col col-md-6">
            <table id="people_table" class="display compact nowrap view_row my_dt"
                style="width:100%">
                <h3>Inactive People</h3>
                <thead>
                    <tr>
                        <!-- <th>Edit</th> -->
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthdate</th>
                        <th>Edit</th>

                    </tr>
                </thead>

            </table>
        </div>
        <div class="col col-md-6">
            <table id="teams_table" class="display compact nowrap my_dt"
                style="width:100%">
                <h3>Teams</h3>
                <button id='create_new_team_button'>Create new team</button>
                <thead>
                    <tr>
                        <!-- <th>Edit</th> -->
                        <th>Id</th>
                        <th>Name</th>
                        <th>Edit</th>

                    </tr>
                </thead>

            </table>
        </div>

    </div>
    <div class="row col-container">
        <div class="col col-md-6">
        </div>
        <div class="col col-md-6">
            <table id="active_people_table" class="display compact nowrap
                view_row my_dt"
                style="width:100%">
                <h3 id="active_people_table_title">Active People</h3>
                <thead>
                    <tr>
                        <!-- <th>Edit</th> -->
                        <th>Team id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Edit</th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<span id="modal_place_holder">

</span>




@endsection


@section('scripts')
<script>
    /** Create datatables**/
function get_people_datatable() {
    var dt = $('#people_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('people.index') }}",
        "columns": [
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "birth_date" },
            { "data": null},
        ],
        "columnDefs": [{
            "targets":-1,
            "defaultContent": "<button type='button' id='person_edit_button' class='btn btn-primary'>Edit</button>"
        }],

        select: {
            style: 'single',
            selector: 'tr',
        },
        "paging":         true,
        dom: '<lf<t>ipB>',
        buttons: [
            {
                text: 'Add to team',
                attr: {id: 'add_person_to_team_button'},
            }
        ]
    });
    return dt;
}

function get_teams_datatable() {
    var dt = $('#teams_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('teams.index') }}",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": null},
        ],
        "columnDefs": [{
            "targets":-1,
            "defaultContent": "<button type='button' id='person_edit_button' class='btn btn-primary'>Edit</button>"
        }],
        select: {
            style: 'single',
            selector: 'tr',
        },
       // "scrollY":        "200px",
        //"scrollCollapse": true,
        "paging":         true,
    });
    return dt;
}

function get_active_people_datatable() {
    var dt = $('#active_people_table').DataTable({

        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('active_people.index') }}",
        "columns": [
            { "data": "team_id" },
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": null},
        ],
        "columnDefs": [{
            "targets":-1,
            "defaultContent": "<button type='button' id='person_edit_button' class='btn btn-primary'>Edit</button>"
        }],
        select: {
            style: 'single',
            selector: 'tr',
        },
       // "scrollY":        "200px",
        //"scrollCollapse": true,
        "paging":         true,
        dom: '<lf<t>ipB>',
        buttons: [
            {
                text: 'Remove from team',
                attr: {id: 'remove_person_from_team_button'},
            }
        ]
    });
    return dt;
}

var active_people_dt = get_active_people_datatable();

var people_dt = get_people_datatable();

var teams_dt = get_teams_datatable();


/** Table functionality**/
teams_dt.on('select', function (e, dt, type, indexes) {
    if (type == 'row') {
        var team_id = teams_dt.rows(indexes).data().pluck('id');
        var team_name = teams_dt.rows(indexes).data().pluck('name');
        active_people_dt.column(0).search('^(' + team_id[0] + ')$', true).draw();
        $('#active_people_table_title').text(team_name[0]);
    }
});
teams_dt.on('deselect', function (e, dt, type, indexes) {
        active_people_dt.column(0).search('(..?)', true).draw();
        $('#active_people_table_title').text("People in teams");
});

/**Edit person**/
$('#people_table').on( 'click','button', function () {
    var person_id = people_dt.rows(".selected").data().pluck('id')[0];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'POST',
        url  : '/people/editPerson',
        data : { 'pid': person_id},
        success: function(response){
            $('#modal_place_holder').html(response)
            $('#person_edit_modal').modal("show");
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
});

/**Edit team**/
$('#teams_table').on( 'click','button', function () {
    var team_id = teams_dt.rows(".selected").data().pluck('id')[0];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'POST',
        url  : '/teams/editTeam',
        data : { 'tid': team_id},
        success: function(response){
            $('#modal_place_holder').html(response)
            $('#team_edit_modal').modal("show");
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
});

/**Edit active person**/
$('#active_people_table').on( 'click','button', function () {
    var active_person_id = active_people_dt.rows(".selected").data().pluck('id')[0];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'POST',
        url  : '/activePeople/editActivePerson',
        data : { 'apid': active_person_id},
        success: function(response){
            $('#modal_place_holder').html(response)
            $('#active_person_edit_modal').modal("show");
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
});

$('#add_person_to_team_button').on('click', function(){
    var person_id = people_dt.rows(".selected").data().pluck('id')[0];
    var team_id = teams_dt.rows(".selected").data().pluck('id')[0];
    if(team_id == null || person_id == null){
        alert("Please select a player and a team")
        return;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'POST',
        url  : '/teams/addperson',
        data : { 'pid': person_id, 'tid': team_id },
        success: function(response){
            active_people_dt.draw();
            people_dt.draw();
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
});

$('#remove_person_from_team_button').on('click', function(){
    var active_person_id = active_people_dt.rows(".selected").data().pluck('id')[0];
    var person_id = active_people_dt.rows(".selected").data().pluck('person_id')[0];
    //var team_id = teams_dt.rows(".selected").data().pluck('id')[0];
    if(person_id == null){
        alert("Please select a player to remove")
        return;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'POST',
        url  : '/teams/removeperson',
        data : { 'apid': active_person_id, 'pid': person_id},
        success: function(response){
            active_people_dt.draw();
            people_dt.draw();
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
});

$('#create_new_team_button').on( 'click', function () {
   // var active_person_id = active_people_dt.rows(".selected").data().pluck('id')[0];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'POST',
        url  : '/teams/createTeam',
        success: function(response){
            $('#modal_place_holder').html(response)
            $('#team_create_modal').modal("show");
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
});

</script>

@endsection

