
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('role_id', 'Role :', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($role_id)>0)
                {!! Form::select('role_id', $role_id,Input::old('role_id'),['class' => 'form-control','required','title'=>'select  role']) !!}
            @else
                {!! Form::text('role_id', 'No role available',['id'=>'role_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('permission_id', 'Select Permission :', ['class' => 'control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::select('permission_id[]',$permission_id,null,['class' => 'form-control','id'=>'permission_list','required'=>'required','multiple' => 'multiple']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required','title'=>'select status of permission role']) !!}
            </div>
        </div>
</div>

<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save permission role information']) !!}
    <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.bootstrap-duallistbox.js') }}"></script>
<script type="text/javascript">
    $("#permission_list").bootstrapDualListbox();
</script>