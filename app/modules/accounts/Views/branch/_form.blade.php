@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('code', null, ['id'=>'code', 'class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('currency_id', 'Currency:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        @if(count($currency_id)>0)
            {!! Form::select('currency_id', $currency_id,Input::old('currency_id'),['class' => 'form-control','required']) !!}
        @else
            {!! Form::text('currency_id', 'No Currency ID available',['id'=>'currency_id','class' => 'form-control','required','disabled']) !!}
        @endif
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::input('number', 'exchange_rate', null, ['id'=>'exchange_rate', 'class' => 'form-control', 'step'=>'any','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('contact_person', 'Contact Person:', ['class' => 'control-label']) !!}
        {!! Form::text('contact_person', null, ['id'=>'contact_person', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('billing_address', 'Billing Address:', ['class' => 'control-label']) !!}
        {!! Form::text('billing_address', null, ['id'=>'billing_address', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ['id'=>'phone', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
        {!! Form::text('mobile', null, ['id'=>'mobile', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
        {!! Form::text('fax', null, ['id'=>'fax', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required']) !!}
    </div>
</div>

<p> &nbsp; </p>

<div class="modal-footer">
    <a href="{{route('branch')}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
</div>
