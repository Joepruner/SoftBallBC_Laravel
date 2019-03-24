@extends('layouts.app')
<!-- Only active player search works -->
<style rel="stylesheet" src="/public/css/team_view.css"></style>
<style>
    .btn-warning {
        color: #111 !important;
    }

    .dataTables_processing {
        position: absolute !important;
        top: 50% !important;
        left: 75% !important;
        width: 50% !important;
        height: 40px !important;
        margin-left: -50% !important;
        margin-top: -25px !important;
        padding-top: 20px !important;
        border: solid #286090 1px;
        border-radius: 10%;
        background-color: #286090 !important;
        z-index: 2000 !important;
    }

    #processing {
        position: relative !important;
        top: 0px !important;
        transform: translateY(-50%) !important;
        font-size: 1.5em !important;
    }

    .dataTable td {
        padding: 2px !important;
    }

</style>

@section('content')

<h1>Manage People</h1>

<button type="button" id="show_people_button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
    autocomplete="off">
    Show inactive people
</button>
<button type="button" id="show_active_people_button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
    autocomplete="off">
    Show active people
</button>
<button type="button" id="create_new_person_button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
    autocomplete="off">
    Create new person
</button>
<h3 class="adv_search_title" style="display:none;">Advanced Search</h3>

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
        <div class="col col-md-6" id="people_display" style=display:none;>

            <table class="table-sm adv_inactive_person_search_table" cellpadding="3" cellspacing="0" border="0"
                style="width: 67%; margin: 0 auto 2em auto; display:none;">
                <thead>
                </thead>
                <tbody>
                    <tr id="filter_col1" data-column="0">
                        <td>First name</td>
                        <td align="center"><input type="text" class="column_filter" id="col0_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col0_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col0_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col2" data-column="1">
                        <td>Last name</td>
                        <td align="center"><input type="text" class="column_filter" id="col1_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col1_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col1_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col3" data-column="2">
                        <td>Birthdate</td>
                        <td align="center"><input type="text" class="column_filter" id="col2_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col2_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col2_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col4" data-column="3">
                        <td>Membership id</td>
                        <td align="center"><input type="text" class="column_filter" id="col3_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col3_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col3_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col5" data-column="4">
                        <td>Email</td>
                        <td align="center"><input type="text" class="column_filter" id="col4_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col4_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col4_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col6" data-column="5">
                        <td>Phone</td>
                        <td align="center"><input type="text" class="column_filter" id="col5_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col5_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col5_smart"
                                checked="checked"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table-sm adv_inactive_person_search_table" cellpadding="3" cellspacing="0" border="0"
                style="width: 67%; margin: 0 auto 2em auto; display:none;">
                <thead>
                </thead>
                <tbody>
                    <tr id="filter_col7" data-column="6">
                        <td>Address 1</td>
                        <td align="center"><input type="text" class="column_filter" id="col6_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col6_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col6_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col8" data-column="8">
                        <td>Address 2</td>
                        <td align="center"><input type="text" class="column_filter" id="col7_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col7_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col7_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col9" data-column="8">
                        <td>City</td>
                        <td align="center"><input type="text" class="column_filter" id="col8_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col8_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col8_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col10" data-column="9">
                        <td>Zip code</td>
                        <td align="center"><input type="text" class="column_filter" id="col9_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col9_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col9_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col11" data-column="10">
                        <td>Province</td>
                        <td align="center"><input type="text" class="column_filter" id="col10_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col10_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col10_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col12" data-column="11">
                        <td>Country</td>
                        <td align="center"><input type="text" class="column_filter" id="col11_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col11_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="col11_smart"
                                checked="checked"></td>
                    </tr>
                </tbody>
            </table>
            <div id="toggle_inactive_person_columns" style="display:none;">
                Toggle column:
                <button class="toggle-vis" data-column="0">First name</button>
                <button class="toggle-vis" data-column="1">Last name</button>
                <button class="toggle-vis" data-column="2">Birthdate</button>
                <button class="toggle-vis" data-column="3">Membership Id</button>
                <button class="toggle-vis" data-column="4">Email</button>
                <button class="toggle-vis" data-column="5">Phone</button>
                <button class="toggle-vis" data-column="6">Address 1</button>
                <button class="toggle-vis" data-column="7">Address 2</button>
                <button class="toggle-vis" data-column="8">City</button>
                <button class="toggle-vis" data-column="9">Zip code</button>
                <button class="toggle-vis" data-column="10">Province</button>
                <button class="toggle-vis" data-column="11">Country</button>
            </div>
            <table id="people_table" class="display compact view_row my_dt" style="width:100%;">
                <h3>Inactive People</h3>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthdate</th>
                        <th>Membership Id</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address line 1</th>
                        <th>Address line 2</th>
                        <th>City</th>
                        <th>Zip code</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="col col-md-6" id="active_people_display" style=display:none;>
            <table class="table-sm adv_active_person_search_table" cellpadding="3" cellspacing="0" border="0"
                style="width: 67%; margin: 0 auto 2em auto; display:none;">
                <thead>
                </thead>
                <tbody>
                    <tr id="filter_col1" data-column="0">
                        <td>First name</td>
                        <td align="center"><input type="text" class="column_filter" id="cola0_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola0_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola0_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col2" data-column="1">
                        <td>Last name</td>
                        <td align="center"><input type="text" class="column_filter" id="cola1_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola1_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola1_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col3" data-column="2">
                        <td>Birthdate</td>
                        <td align="center"><input type="text" class="column_filter" id="cola2_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola2_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola2_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col4" data-column="3">
                        <td>Category</td>
                        <td align="center"><input type="text" class="column_filter" id="cola3_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola3_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola3_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col5" data-column="4">
                        <td>Role</td>
                        <td align="center"><input type="text" class="column_filter" id="cola4_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola4_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola4_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col6" data-column="5">
                        <td>Membership id</td>
                        <td align="center"><input type="text" class="column_filter" id="cola5_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola5_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola5_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col7" data-column="6">
                        <td>Email</td>
                        <td align="center"><input type="text" class="column_filter" id="cola6_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola6_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola6_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col8" data-column="7">
                        <td>Phone</td>
                        <td align="center"><input type="text" class="column_filter" id="cola7_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola7_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola7_smart"
                                checked="checked"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table-sm adv_active_person_search_table" cellpadding="3" cellspacing="0" border="0"
                style="width: 67%; margin: 0 auto 2em auto; display:none;">
                <thead>
                </thead>
                <tbody>
                    <tr id="filter_col9" data-column="8">
                        <td>Address 1</td>
                        <td align="center"><input type="text" class="column_filter" id="cola8_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola8_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola8_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col10" data-column="9">
                        <td>Address 2</td>
                        <td align="center"><input type="text" class="column_filter" id="cola9_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola9_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola9_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col11" data-column="10">
                        <td>City</td>
                        <td align="center"><input type="text" class="column_filter" id="cola10_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola10_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola10_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col12" data-column="11">
                        <td>Zip code</td>
                        <td align="center"><input type="text" class="column_filter" id="cola11_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola11_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola11_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col13" data-column="12">
                        <td>Province</td>
                        <td align="center"><input type="text" class="column_filter" id="cola12_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola12_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola12_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col14" data-column="13">
                        <td>Country</td>
                        <td align="center"><input type="text" class="column_filter" id="cola13_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola13_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola13_smart"
                                checked="checked"></td>
                    </tr>
                    <tr id="filter_col15" data-column="14">
                        <td>Country</td>
                        <td align="center"><input type="text" class="column_filter" id="cola14_filter"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola14_regex"></td>
                        <td align="center"><input type="checkbox" class="column_filter" id="cola14_smart"
                                checked="checked"></td>
                    </tr>
                </tbody>
            </table>
            <div id="toggle_active_person_columns" style="display:none;">
                Toggle column:
                <button class="toggle-vis" data-column="0">First name</button>
                <button class="toggle-vis" data-column="1">Last name</button>
                <button class="toggle-vis" data-column="2">Birthdate</button>
                <button class="toggle-vis" data-column="3">Category</button>
                <button class="toggle-vis" data-column="4">Role</button>
                <button class="toggle-vis" data-column="5">Membership Id</button>
                <button class="toggle-vis" data-column="6">Email</button>
                <button class="toggle-vis" data-column="7">Phone</button>
                <button class="toggle-vis" data-column="8">Address 1</button>
                <button class="toggle-vis" data-column="9">Address 2</button>
                <button class="toggle-vis" data-column="10">City</button>
                <button class="toggle-vis" data-column="11">Zip code</button>
                <button class="toggle-vis" data-column="12">Province</button>
                <button class="toggle-vis" data-column="13">Country</button>
                <button class="toggle-vis" data-column="14">Team Id</button>
            </div>
            <table id="active_people_table" class="display compact
                view_row my_dt" style="width:100%">
                <h3 id="active_people_table_title">Active People</h3>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthdate</th>
                        <th>Category</th>
                        <th>Role</th>
                        <th>Membership Id</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address line 1</th>
                        <th>Address line 2</th>
                        <th>City</th>
                        <th>Zip code</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Team Id</th>
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
            dom: '<rlfB<t>ip>',
            "processing": true,
            "language": {
                processing: "<div id='processing' class='spinner-grow'>Loading...</div>"
            },
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
                    "data": "membership_id"
                },
                {
                    "data": "email"
                },
                {
                    "data": "phone"
                },
                {
                    "data": "address_line_1"
                },
                {
                    "data": "address_line_2"
                },
                {
                    "data": "city"
                },
                {
                    "data": "zip_code"
                },
                {
                    "data": "province"
                },
                {
                    "data": "country"
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

            buttons: [{
                text: 'Advanced search',
                attr: {
                    id: 'adv_search_inactive_person_btn',
                    class: 'btn'

                },
            }],

        });
        return dt;
    }

    function get_active_people_datatable() {
        var dt = $('#active_people_table').DataTable({
            dom: '<rlfB<t>ip>',
            "processing": true,
            "language": {
                processing: "<div id='processing' class='spinner-grow'>Loading...</div>"
            },
            "serverSide": true,
            "searchable": true,
            "ajax": "{{ route('active_people.index') }}",
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
                    "data": "category"
                },
                {
                    "data": "type"
                },
                {
                    "data": "membership_id"
                },
                {
                    "data": "email"
                },
                {
                    "data": "phone"
                },
                {
                    "data": "address_line_1"
                },
                {
                    "data": "address_line_2"
                },
                {
                    "data": "city"
                },
                {
                    "data": "zip_code"
                },
                {
                    "data": "province"
                },
                {
                    "data": "country"
                },
                {
                    "data": "team_id"
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

            buttons: [{
                text: 'Advanced search',
                attr: {
                    id: 'adv_search_active_person_btn',
                    class: 'btn'
                }
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
        if (team_selected && active_person_selected) {
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
        if (team_selected && inactive_person_selected) {
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

    function hide_active_adv_search() {
        $('.adv_search_title').css('display', 'none')
        $('#toggle_active_person_columns').css('display', 'none')
        $('.adv_active_person_search_table').css('display', 'none');
        $('#adv_search_active_person_btn').text("Advanced search")
        for (var i = 4; i < 9; i++) {
            active_people_dt.column(i).visible(false, false);
        }
        active_people_dt.columns.adjust().draw(false);
    }

    function hide_inactive_adv_search() {
        $('.adv_search_title').css('display', 'none')
        $('#toggle_inactive_person_columns').css('display', 'none')
        $('.adv_inactive_person_search_table').css('display', 'none');
        $('#adv_search_inactive_person_btn').text("Advanced search")
        for (var i = 4; i < 7; i++) {
            people_dt.column(i).visible(false, false);
        }
        people_dt.columns.adjust().draw(false);
    }

    $('#create_new_person_button').on('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/people/createPerson',
            success: function (response) {
                $('#modal_place_holder').html(response)
                $('#person_create_modal').modal("show");
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' +
                    errorThrown);
            }
        });
    });

    $('#show_people_button').on('click', function () {
        hide_active_adv_search();
        hide_inactive_adv_search();
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
            $('#people_display').removeClass('col-md-12')
            $('#people_display').addClass('col-md-6')
            $('#people_display').slideToggle();
            $('#show_people_button').addClass('active');
            $('#show_active_people_button').removeClass('active');
        } else if ($('#people_display').is(":visible") == true && $('#active_people_display').is(":visible") ==
            true) {
            $('#people_display').slideToggle(function () {
                $('#active_people_display').removeClass('col-md-6')
                $('#active_people_display').addClass('col-md-12')
            });
            $('#show_people_button').removeClass('active');
        } else {
            $('#people_display').slideToggle();
        }

    });
    $('#show_active_people_button').on('click', function () {
        hide_active_adv_search();
        hide_inactive_adv_search();
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
            $('#active_people_display').removeClass('col-md-12')
            $('#active_people_display').addClass('col-md-6')
            $('#active_people_display').slideToggle();
            $('#show_people_button').removeClass('active');
            $('#show_active_people_button').addClass('active');
        } else if ($('#people_display').is(":visible") == true && $('#active_people_display').is(":visible") ==
            true) {
            $('#active_people_display').slideToggle(function () {
                $('#people_display').removeClass('col-md-6')
                $('#people_display').addClass('col-md-12')
            });
            $('#show_active_people_button').removeClass("active");
        } else {
            $('#active_people_display').slideToggle();
        }
    });

    /**Advanced Searchin**/
    function filterColumn(i) {
        $('#people_table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }

    function filterColumn(i) {
        $('#active_people_table').DataTable().column(i).search(
            $('#cola' + i + '_filter').val(),
            $('#cola' + i + '_regex').prop('checked'),
            $('#cola' + i + '_smart').prop('checked')
        ).draw();
    }



    $(document).ready(function () {
        $('input.column_filter').on('keyup click', function () {
            filterColumn($(this).parents('tr').attr('data-column'));
        });
        for (var i = 4; i < 12; i++) {
            people_dt.column(i).visible(false, false);
        }
        people_dt.columns.adjust().draw(false);

        for (var i = 4; i < 15; i++) {
            active_people_dt.column(i).visible(false, false);
        }
        active_people_dt.columns.adjust().draw(false);

        $('.column_filter:checkbox').css('visibility', 'hidden');
        $('.global_filter:checkbox').css('visibility', 'hidden');
    });

    $('#adv_search_inactive_person_btn').on('click', function () {
        if ($('#adv_search_inactive_person_btn').text() == 'Advanced search') {
            hide_active_adv_search();
            $('#active_people_display').removeClass('col-md-12');
            $('#active_people_display').addClass('col-md-6');
            $('#active_people_display').slideUp(function () {
                $('#people_display').removeClass('col-md-6');
                $('#people_display').addClass('col-md-12');
                $('#adv_search_inactive_person_btn').text("Basic view")
                $('.adv_search_title').css('display', 'inline')
                $('#toggle_inactive_person_columns').css('display', 'block')
                $('.adv_inactive_person_search_table').css('display', 'inline');
                for (var i = 4; i < 7; i++) {
                    people_dt.column(i).visible(true, true);
                }
                people_dt.columns.adjust().draw(false);
            })
        } else {
            hide_inactive_adv_search();
        }
    });

    $('#adv_search_active_person_btn').on('click', function () {
        if ($('#adv_search_active_person_btn').text() == 'Advanced search') {
            hide_inactive_adv_search();
            $('#people_display').removeClass('col-md-12');
            $('#people_display').addClass('col-md-6');
            $('#people_display').slideUp(function () {
                $('#active_people_display').removeClass('col-md-6');
                $('#active_people_display').addClass('col-md-12');
                $('#adv_search_active_person_btn').text("Basic view")
                $('.adv_search_title').css('display', 'inline')
                $('#toggle_active_person_columns').css('display', 'block')
                $('.adv_active_person_search_table').css('display', 'inline');
                for (var i = 4; i < 9; i++) {
                    active_people_dt.column(i).visible(true, true);
                }
                active_people_dt.columns.adjust().draw(false);
            })
        } else {
            hide_active_adv_search();
        }
    });

    $('button.toggle-vis').on('click', function (e) {
        e.preventDefault();
        var column = people_dt.column($(this).attr('data-column'));
        column.visible(!column.visible());
    });

    $('button.toggle-vis').on('click', function (e) {
        e.preventDefault();
        var column = active_people_dt.column($(this).attr('data-column'));
        column.visible(!column.visible());
    });

</script>

@endsection
