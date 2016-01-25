@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


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

<p> &nbsp; </p>

{{--<a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>--}}
{{--<a href=""  class="btn btn-default" type="button"> Close </a>
{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}--}}

<div class="modal-footer">
    <a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
</div>

