
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    {!! Form::hidden('user_id',$user_id) !!}
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('fathers_name', 'Father Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('fathers_name', Input::old('fathers_name'), ['class' => 'form-control','required','title'=>'Enter your father name']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('mothers_name', 'Mother Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('mothers_name',Input::old('mothers_name'), ['class' => 'form-control','required','title'=>'Enter your mother name']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('fathers_occupation', 'Fathers Occupation:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('fathers_occupation', Input::old('fathers_occupation'), ['id'=>'last_name', 'class' => 'form-control','required'=>'required','title'=>'Enter your father occupation']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('fathers_phone', 'Fathers Phone:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('fathers_phone',Input::old('fathers_phone'), ['id'=>'father-phone','class' => 'form-control','required','title'=>'Enter your father phone']) !!}
            <span id='mss'></span>
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('mothers_occupation', 'Mother Occupation:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('mothers_occupation', Input::old('mothers_occupation'), ['class' => 'form-control','required'=>'required','title'=>'Enter your mother occupation']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('mothers_phone', 'Mother Phone:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('mothers_phone',Input::old('mothers_phone'), ['id'=>'mother-phone','class' => 'form-control','required','title'=>'Enter your mother phone']) !!}
            <span id='error-msg'></span>
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('national_id', 'National ID#:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('national_id', Input::old('national_id'), ['id'=>'national-id','class' => 'form-control','required','title'=>'Enter national ID#','maxlength'=>20]) !!}
            <span id='msg-error'></span>
        </div>
        <div class="col-sm-6">
            {!! Form::label('driving_licence', 'Driving Licence:', ['class' => 'control-label']) !!}
            {!! Form::text('driving_licence',Input::old('driving_licence'), [ 'class' => 'form-control','title'=>'Enter driving licence']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('passport', 'Passport:', ['class' => 'control-label']) !!}
            {!! Form::text('passport', Input::old('passport'), ['class' => 'form-control','title'=>'Enter passport']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('place_of_birth', 'Place Of Birth:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('place_of_birth',Input::old('place_of_birth'), [ 'class' => 'form-control','required','title'=>'Enter Place Of Birth']) !!}
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
             array('class' => 'form-control','required','title'=>'Select Marital Status')) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('nationality', 'Nationality:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('nationality',Input::old('nationality'), [ 'class' => 'form-control','required','title'=>'Enter  Nationality']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('religion', 'Religion:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('religion', Input::old('religion'), ['class' => 'form-control','required'=>'required','title'=>'Enter  Your Religion']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('present_address', 'Present Address:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::textarea('present_address', Input::old('present_address'), ['class' => 'form-control','required'=>'required','size' => '12x3','title'=>'Enter Present Address']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('permanent_address', 'Permanent Address:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::textarea('permanent_address',Input::old('permanent_address'), [ 'class' => 'form-control','required','size' => '12x3','title'=>'Enter Present Address']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('freedom_fighter', 'Freedom Fighter:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="form-inline">

                <div class="radio">
                    {!! Form::radio('freedom_fighter', '1', (Input::old('freedom_fighter') == '1'), array('id'=>'1', 'class'=>'radio','required','title'=>'Select Freedom Fighter(Yes/No)')) !!}
                    {!! Form::label('freedom_fighter', 'Yes') !!}
                </div>
                <div class="radio">
                    {!! Form::radio('freedom_fighter', '0', (Input::old('freedom_fighter') == '0'), array('id'=>'0', 'class'=>'radio','title'=>'Select Freedom Fighter(Yes/No)')) !!}
                    {!!Form::label('freedom_fighter', 'No')  !!}
                </div>
            </div>
        </div>
        <div class="col-sm-9">
                {!! Form::label('signature', 'Signature:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
            <p class="narration">System will allow these types of image(png,gif,jpeg,jpg Format) </p>
                {!! Form::file('signature',Input::old('signature'), [ 'class' => 'form-control','required'=>'required']) !!}
        </div>
    </div>
</div>
<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save branch information']) !!}

    <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true" data-placement="top" data-content="click close button for close this entry form">Close</button>
</div>

<script>
    $('#father-phone').change( function () {
        var code =$(this).val();

        if (isNaN(code)) {
            $('#mss').html('Incorrect !!Please Insert Only Numeric Digits.').css('color', 'red');

        } else
            $('#mss').html('');
    });

    $('#mother-phone').change( function () {
        var code =$(this).val();

        if (isNaN(code)) {
            $('#error-msg').html('Incorrect !!Please Insert Only Numeric Digits.').css('color', 'red');

        } else
            $('#error-msg').html('');
    });

    $('#national-id').change( function () {
        var code =$(this).val();

        if (isNaN(code)) {
            $('#msg-error').html('Incorrect !!Please Insert Only Numeric Digits.').css('color', 'red');

        } else
            $('#msg-error').html('');
    });

</script>
