
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    {!! Form::hidden('user_id',$user_id) !!}
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('first_name', 'First Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('first_name', Input::old('first_name'), ['id'=>'first_name', 'class' => 'form-control', 'required'=>'required']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('middle_name', 'Middle Name:', ['class' => 'control-label']) !!}
            {!! Form::text('middle_name',Input::old('middle_name'), ['id'=>'middle_name', 'class' => 'form-control']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('last_name', 'Last Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('last_name', Input::old('last_name'), ['id'=>'last_name', 'class' => 'form-control','required'=>'required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('city',Input::old('city'), ['id'=>'city', 'class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('state',Input::old('state'), ['id'=>'state', 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('country_id', 'Country') !!}
            <small class="required">(Required)</small>
            {!!Form::select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control','required'])  !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('zip_code', 'Zip Code') !!}
            <small class="required">(Required)</small>
            {!! Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','required')) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('date_of_birth', 'Date Of Birth:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="input-group date">
                {!! Form::text('date_of_birth', Input::old('date_of_birth'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select birth date']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::label('gender', 'Gender:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="form-inline">

                <div class="radio">
                    {!! Form::radio('gender', 'male', (Input::old('gender') == 'male'), array('id'=>'male', 'class'=>'radio')) !!}
                    {!! Form::label('male', 'Male') !!}
                </div>
                <div class="radio radio-margin-left">
                    {!! Form::radio('gender', 'female', (Input::old('gender') == 'female'), array('id'=>'female', 'class'=>'radio')) !!}
                    {!! Form::label('female', 'Female') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save branch information']) !!}
    <a href="{{route('create-user-info')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>