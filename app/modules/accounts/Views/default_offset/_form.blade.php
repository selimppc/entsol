
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('offset', 'Offset:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('offset', null, ['id'=>'offset', 'class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('pnl_account', 'Pnl Account:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('pnl_account', null, ['id'=>'pnl_account', 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
            {!! Form::selectRange('year',2010,2030, Input::old('year'),['class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectRange('period', 1, 12,Input::old('year'),['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class'=>'form-control ','required']) !!}
    </div>

</div>

<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
    <a href="{{route('default-offset')}}" class=" btn btn-default">Close</a>
</div>