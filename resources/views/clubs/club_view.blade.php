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

@if(Session::get('access_level') == 'club')
    <h4>{{ Session::get('access_level_name') }}</h4>

<button type="button" id="show_teams_button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
        Show teams
</button>

<?php $club = DB::table('clubs')->where('id', '=', Session::get('access_id'))?>

<table id="club_table" class="display compact view_row my_dt" style="width:100%;">
        <h3>Clubs</h3>
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

@endif

@endsection

@section('scripts')

<script>
        function get_clubs_datatable() {
            var dt = $('#club_table').DataTable({
                dom: '<rlfB<t>ip>',
                "processing": true,
                "language": {
                    processing: "<div id='processing' class='spinner-grow'>Loading...</div>"
                },
                "serverSide": true,
                "searchable": true,
                "ajax": "{{ route('clubs.index') }}",
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


</script>

@endsection
