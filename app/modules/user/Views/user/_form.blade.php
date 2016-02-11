<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('username', 'UserName:', ['class' => 'control-label']) !!}
            {!! Form::text('username',Input::old('username'),['class' => 'form-control','placeholder'=>'User Name','required', 'title'=>'Enter User Name']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('email', 'Email Address:', ['class' => 'control-label']) !!}
            {!! Form::email('email',Input::old('email'),['class' => 'form-control','placeholder'=>'Email Address','required', 'title'=>'Enter User Email Address']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password',['class' => 'form-control','required','placeholder'=>'Password','title'=>'Enter User Password']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required','title'=>'select branch name']) !!}
        </div>
    </div>
</div>
<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('role_id', 'User Role:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('role_id',$role, Input::old('role_id'),['class' => 'form-control','required','title'=>'select role name']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('expire_date', 'Expire Date:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="input-group date">
                {!! Form::text('expire_date', Input::old('expire_date'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select expire date']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}
    <a href="{{route('user-list')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>



