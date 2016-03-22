{{--{!! Form::text('text',$role_value) !!}--}}
{{--<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['post-permission']]) !!}--}}

    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('permission_id', 'Select Permission :', ['class' => 'control-label']) !!}
                {!! Form::select('permission_id',array(),Input::old('permission_id'),['id' => 'route-list','class'=>'permission_list','multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="form-margin-btn">
        {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save information']) !!}
        <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
    </div>
    {{--{!! Form::close() !!}
</div>
--}}


<p> &nbsp; </p>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.bootstrap-duallistbox.js') }}"></script>

<script type="text/javascript">
    $(".permission_list").bootstrapDualListbox();
</script>

