
@extends('layouts.app')
<style rel="stylesheet" src="/public/css/team_view.css"></style>
<style>
    .dataTables_wrapper .dt-buttons {
        float:right;
    }
</style>
@section('content')


<h1>View and edit people</h1>

<div class="container">
    <div class="row col-container">
        <div class="col col-md-6">
            <table id="people_table" class="display compact nowrap"
                style="width:100%">
                <h3>Free agents</h3>
                <thead>
                    <tr>
                        <!-- <th>Edit</th> -->
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthdate</th>

                    </tr>
                </thead>

            </table>
        </div>
        <div class="col col-md-6">
            <table id="active_people_table" class="display compact nowrap"
                style="width:100%">
                <h3>People in teams</h3>
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

    </div>
</div>

@endsection


@section('scripts')
<script>
function get_people_datatable() {
    var dt = $('#people_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('people.index') }}",
        "columns": [
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "birth_date" },
        ],
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
                text: 'Edit Person',
                attr: {id: 'ex'},
            }
        ]
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
        ],
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
                text: 'Edit active person',
                attr: {id: 'remove_person_from_team_button'},
            }
        ]

    });

    return dt;
}

var active_people_dt = get_active_people_datatable();
//<!-- <?php echo "Testing!!!"; ?> -->

var people_dt = get_people_datatable();



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
</script>

@endsection