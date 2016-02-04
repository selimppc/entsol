<form class="form-horizontal" id="jq-validation-form">

<div class="panel-heading help-text-color">
    <div class="help-text-top">
        <em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('code', null, ['id'=>'code', 'class' => 'form-control','required','autofocus','title'=>'Required and Unique Field : Enter Group One Code, Example :: 101']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','title'=>'Required and Unique Field : Enter Group One Title, Example :: FIXED ASSETS']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'Optional Field : Enter Descriptions about group one code']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class' => 'form-control','required','title'=>'Required Field : Choose Active option']) !!}
        </div>
    </div>
</div>

<p> &nbsp; </p>


<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','title'=>'Click Save Changes button for save Group One Information']) !!}
    <a href="{{route('group-one')}}" class=" btn btn-default" title="Click Close button for close this entry form">Close</a>
</div>

</form>

