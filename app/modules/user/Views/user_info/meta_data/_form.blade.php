
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    {!! Form::hidden('user_id',$user_id) !!}
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('fathers_name', 'Father Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('fathers_name', Input::old('fathers_name'), ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('mothers_name', 'Mother Name:', ['class' => 'control-label']) !!}
            {!! Form::text('mothers_name',Input::old('mothers_name'), ['id'=>'middle_name', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-5">
            {!! Form::label('fathers_occupation', 'Fathers Occupation:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('fathers_occupation', Input::old('fathers_occupation'), ['id'=>'last_name', 'class' => 'form-control','required'=>'required']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('fathers_phone', 'Fathers Phone:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('fathers_phone',Input::old('fathers_phone'), ['id'=>'state', 'class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('freedom_fighter', 'Freedom Fighter:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="form-inline">

                <div class="radio">
                    {!! Form::radio('freedom_fighter', '1', (Input::old('freedom_fighter') == '1'), array('id'=>'1', 'class'=>'radio')) !!}
                    {!! Form::label('freedom_fighter', 'Yes') !!}
                </div>
                <div class="radio">
                    {!! Form::radio('freedom_fighter', '0', (Input::old('freedom_fighter') == '0'), array('id'=>'0', 'class'=>'radio')) !!}
                    {!!Form::label('freedom_fighter', 'No')  !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('mothers_occupation', 'Mother Occupation:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('mothers_occupation', Input::old('mothers_occupation'), ['class' => 'form-control','required'=>'required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('mothers_phone', 'Mother Phone:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('mothers_phone',Input::old('mothers_phone'), [ 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('national_id', 'National ID#:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('national_id', Input::old('national_id'), ['class' => 'form-control','required'=>'required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('driving_licence', 'Driving Licence:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('driving_licence',Input::old('driving_licence'), [ 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('passport', 'Passport:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('passport', Input::old('passport'), ['class' => 'form-control','required'=>'required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('place_of_birth', 'Place Of Birth:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('place_of_birth',Input::old('place_of_birth'), [ 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('marital_status', 'Marital Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('marital_status', array('' => 'Select one',
             'single' => 'Single', 'married' => 'Married','divorsed'=>'Divorsed'), Input::old('marital_status'),
             array('class' => 'form-control')) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('nationality', 'Nationality:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('nationality',Input::old('nationality'), [ 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('religion', 'Religion:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('religion', Input::old('religion'), ['class' => 'form-control','required'=>'required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('signature', 'Signature:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::file('signature',Input::old('signature'), [ 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('present_address', 'Present Address:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::textarea('present_address', Input::old('present_address'), ['class' => 'form-control','required'=>'required','size' => '12x3']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('permanent_address', 'Permanent Address:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::textarea('permanent_address',Input::old('permanent_address'), [ 'class' => 'form-control','required','size' => '12x3']) !!}
        </div>
    </div>
</div>
<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save branch information']) !!}
    <a href="{{route('create-user-info')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>
