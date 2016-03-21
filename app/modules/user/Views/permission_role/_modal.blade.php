<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Assign Permission</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['get-permission']]) !!}
                       @include('user::permission_role._duallistbox_form')
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save permission role information']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
