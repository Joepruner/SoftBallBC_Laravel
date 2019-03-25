
<div class="modal fade" id="person_create_modal" tabindex="-1" role="dialog"
    aria-labelledby="person_create_modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="person_create_modal_title">Create Person</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => 'PersonController@store']) !!}
                @include('people.person_create_form', ['submitButtonText' =>
                'Create'])
                {!! Form::close() !!}


            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
</div>

