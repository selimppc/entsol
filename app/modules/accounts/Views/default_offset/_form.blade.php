
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('offset', 'Offset:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('offset', null, ['id'=>'offset', 'class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('pnl_account', 'Pnl Account:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('pnl_account', null, ['id'=>'pnl_account', 'class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
        {!! Form::input('number', 'year', null, ['id'=>'year', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
        {!! Form::input('number', 'period', null, ['id'=>'period', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class'=>'form-control ','required']) !!}

</div>

<p> &nbsp; </p>

<div class="modal-footer">
    <a href="{{route('default-offset')}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
</div>

