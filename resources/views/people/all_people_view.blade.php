@extends('layouts.app')
<style rel="stylesheet" src="/public/css/team_view.css"></style>
<style>
    .btn-warning {
        color: #111 !important;
      }
</style>

@section('content')

<h1>Manage People</h1>

    <button type="button" id="show_people_button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
        Show inactive people
    </button>
    <button type="button" id="show_active_people_button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
        Show active people
    </button>

<span class="alert alert-success" id="add_remove_alert" role="alert"
    style="display:none; position:fixed; opacity:1; z-index:30">
</span>
@if ($message = Session::get('success'))
<span class="alert alert-success alert-block" style="position:fixed; opacity:1; z-index:30">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ $message }}
</span>
@endif
<div class="container">
    <div class="row col-container">
        <div id="team_col" class="col col-md-12" style="display:none;">
            <table id="teams_table" class="display compact my_dt" style="width:100%;">
                <h3>Teams</h3>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="col col-md-6" id="people_display" style=display:none;>
            <table id="people_table" class="display compact view_row my_dt" style="width:100%;">
                <h3>Inactive People</h3>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthdate</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="col col-md-6" id="active_people_display" style=display:none;>
            <table id="active_people_table" class="display compact
                view_row my_dt" style="width:100%">
                <h3 id="active_people_table_title">Active People</h3>
                <thead>
                    <tr>
                        <th>Team id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Edit</th>
                    </tr>
                </thead>

            </table>
        </div>
        <!-- </div> -->
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
            "searchable": true,
            "ajax": "{{ route('people.index') }}",
            "columns": [{
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": "birth_date"
                },
                {
                    "data": undefined
                },
            ],
            "columnDefs": [{
                "targets": -1,
                "defaultContent": "<button type='button' id='person_edit_button' class='btn btn-primary'>Edit</button>"
            }],

            select: {
                style: 'single',
                selector: 'tr',
                info: false
            },
            "paging": true,
            dom: '<lf<t>ipB>',
            buttons: [{
                text: 'Select a team and person to add',
                attr: {
                    id: 'add_person_to_team_button',
                    class: 'btn btn-warning'

                },
            }]
        });
        return dt;
    }

    function get_teams_datatable() {
        var dt = $('#teams_table').DataTable({
            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": "{{ route('teams.index') }}",
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": undefined
                },
            ],
            "columnDefs": [{
                "targets": -1,
                "defaultContent": "<button type='button' id='team_edit_button' class='btn btn-primary'>Edit</button>"
            }],
            dom: 'Bfrtip',
            buttons: [{
                text: 'Create new team',
                attr: {
                    class: 'btn btn-primary'
                },
                action: function (e, dt, node, config) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/teams/createTeam',
                        success: function (response) {
                            $('#modal_place_holder').html(response)
                            $('#team_create_modal').modal("show");
                            console.log(response);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' +
                                errorThrown);
                        }
                    });
                }
            }],
            select: {
                style: 'single',
                selector: 'tr',
                info: false
            },
            // "scrollY":        "200px",
            //"scrollCollapse": true,
            "paging": true,
        });
        return dt;
    }

    function get_active_people_datatable() {
        var dt = $('#active_people_table').DataTable({

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": "{{ route('active_people.index') }}",
            "columns": [{
                    "data": "team_id"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": undefined
                },
            ],
            "columnDefs": [{
                "targets": -1,
                "defaultContent": "<button type='button' id='person_edit_button' class='btn btn-primary'>Edit</button>"
            }],
            select: {
                style: 'single',
                selector: 'tr',
                info: false
            },
            // "scrollY":        "200px",
            //"scrollCollapse": true,
            "paging": true,
            dom: '<lf<t>ipB>',
            buttons: [{
                text: 'Select a team and person to remove',
                attr: {
                    id: 'remove_person_from_team_button',
                    class: 'btn btn-warning'
                },
            }]
        });
        return dt;
    }

    var active_people_dt = get_active_people_datatable();

    var people_dt = get_people_datatable();

   // var teams_dt = get_teams_datatable();

    var team_selected = false;
    var active_person_selected = false;
    var inactive_person_selected = false;


    /** Table functionality**/

    active_people_dt.on('select', function (e, dt, type, indexes) {
        active_person_selected = true;
        if(team_selected && active_person_selected){
            $('#remove_person_from_team_button').text('Remove person from team')
            $('#remove_person_from_team_button').removeClass('btn-warning')
            $('#remove_person_from_team_button').addClass('btn-success')
        }
    });
    active_people_dt.on('deselect', function (e, dt, type, indexes) {
        active_person_selected = false;
            $('#remove_person_from_team_button').text('Select a team and person to remove')
            $('#remove_person_from_team_button').removeClass('btn-success')
            $('#remove_person_from_team_button').addClass('btn-warning')
    });

    people_dt.on('select', function (e, dt, type, indexes) {
        inactive_person_selected = true;
        if(team_selected && inactive_person_selected){
            $('#add_person_to_team_button').text('Add person to team')
            $('#add_person_to_team_button').removeClass('btn-warning')
            $('#add_person_to_team_button').addClass('btn-success')
        }
    });
    people_dt.on('deselect', function (e, dt, type, indexes) {
        active_person_selected = false;
            $('#add_person_to_team_button').text('Select a team and person to add')
            $('#add_person_to_team_button').removeClass('btn-success')
            $('#add_person_to_team_button').addClass('btn-warning')
    });

    /**Edit person**/
    $('#people_table').on('click', 'button', function () {
        var person_id = people_dt.rows(".selected").data().pluck('id')[0];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/people/editPerson',
            data: {
                'pid': person_id
            },
            success: function (response) {
                $('#modal_place_holder').html(response)
                $('#person_edit_modal').modal("show");
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

    /**Edit team**/

    /**Edit active person**/
    $('#active_people_table').on('click', 'button', function () {
        var active_person_id = active_people_dt.rows(".selected").data().pluck('id')[0];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/activePeople/editActivePerson',
            data: {
                'apid': active_person_id
            },
            success: function (response) {
                $('#modal_place_holder').html(response)
                $('#active_person_edit_modal').modal("show");
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

    $('#show_people_button').on('click', function () {
        if ($('#people_display').is(":visible") == false && $('#active_people_display').is(":visible") ==
            false) {
            $('#people_display').removeClass('col-md-6')
            $('#people_display').addClass('col-md-12')
            $('#people_display').slideToggle();
            $('#show_people_button').addClass('active');
        } else if ($('#people_display').is(":visible") == false && $('#active_people_display').is(":visible") ==
            true) {
            $('#active_people_display').removeClass('col-md-12')
            $('#active_people_display').addClass('col-md-6')
            $('#people_display').slideToggle();
            $('#show_people_button').addClass('active');
            $('#show_active_people_button').removeClass('active');
        } else if ($('#people_display').is(":visible") == true && $('#active_people_display').is(":visible") ==
        true)  {
            $('#people_display').slideToggle(function(){
                $('#active_people_display').removeClass('col-md-6')
                $('#active_people_display').addClass('col-md-12')
            });
            $('#show_people_button').removeClass('active');
        }
        else {
            $('#active_people_display').slideToggle();
        }

    });
    $('#show_active_people_button').on('click', function () {
        if ($('#people_display').is(":visible") == false && $('#active_people_display').is(":visible") ==
            false) {
            $('#active_people_display').removeClass('col-md-6')
            $('#active_people_display').addClass('col-md-12')
            $('#active_people_display').slideToggle();
            $('#show_active_people_button').addClass('active');
        } else if ($('#people_display').is(":visible") == true && $('#active_people_display').is(":visible") ==
            false) {

            $('#people_display').removeClass('col-md-12')
            $('#people_display').addClass('col-md-6')
            $('#active_people_display').slideToggle();
            $('#show_people_button').removeClass('active');
            $('#show_active_people_button').addClass('active');
        } else if ($('#people_display').is(":visible") == true && $('#active_people_display').is(":visible") ==
        true) {
            $('#active_people_display').slideToggle(function(){
                $('#people_display').removeClass('col-md-6')
                $('#people_display').addClass('col-md-12')
            });
            $('#show_active_people_button').removeClass("active");
        }
        else {
            $('#active_people_display').slideToggle();
        }


    });

</script>

@endsection
