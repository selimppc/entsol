
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
            <div class="col-sm-6">
                {!! Form::label('permission_id', 'Permission :', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                @if(count($permission_id)>0)
                    {!! Form::select('permission_id', $permission_id,Input::old('permission_id'),['class' => 'form-control','required','title'=>'select  permission']) !!}
                @else
                    {!! Form::text('permission_id', 'No Permission available',['id'=>'permission_id','class' => 'form-control','required','disabled']) !!}
                @endif
            </div>
        </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required','title'=>'select status of permission role']) !!}
            </div>
        </div>
</div>
{{--
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'enter descriptions about permission']) !!}
        </div>
    </div>
</div>--}}

<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save permission role information']) !!}
    <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>