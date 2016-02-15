
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('first_name', 'First Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('first_name', Input::old('first_name'), ['id'=>'first_name', 'class' => 'form-control', 'minlength'=>'2', 'required'=>'required']) !!}
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
            {!! Form::label('date', 'Date Of Birth:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="input-group date">
                {!! Form::text('date', date('Y/m/d'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select birth date']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-6">


        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
            {!! Form::text('city',Input::old('city'), ['id'=>'city', 'class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
            {!! Form::text('state',Input::old('state'), ['id'=>'state', 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('country_id', 'Country') !!}
            {!!Form::select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control','required'])  !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('zip_code', 'Zip Code') !!}
            {!! Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('contact_person', 'Contact Person:', ['class' => 'control-label']) !!}
            {!! Form::text('contact_person', null, ['id'=>'contact_person', 'class' => 'form-control','required','title'=>'enter contact person of branch']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
            {!! Form::input('number','phone', null, ['id'=>'phone', 'class' => 'form-control','required','title'=>'enter phone number of branch']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
            {!! Form::input('number','mobile', null, ['id'=>'mobile', 'class' => 'form-control','title'=>'enter mobile number of branch']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
            {!! Form::text('fax', null, ['id'=>'fax', 'class' => 'form-control','title'=>'enter fax number of branch']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control','required','title'=>'enter email address of branch']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class' => 'form-control','required','title'=>'select status of branch']) !!}
        </div>
    </div>
</div>

<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save branch information']) !!}
    <a href="{{route('branch')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>