<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('code', Input::old('code'), ['id'=>'code', 'class' => 'form-control', 'style'=>'text-transform:uppercase','required','autofocus','title'=>'enter currency code, example :: BDT']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title', Input::old('title'), ['id'=>'title', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter currency title, example :: bangladeshi taka']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', Input::old('description'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'enter descriptions about currency code']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
            {!! Form::input('number', 'exchange_rate', Input::old('exchange_rate'), ['id'=>'exchange_rate', 'class' => 'form-control', 'step'=>'any','title'=>'enter exchange rate for currency code']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class'=>'form-control ','required','title'=>'choose active option']) !!}
        </div>
    </div>
</div>

<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save currency information']) !!}
    <a href="{{route('currency')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form" onclick="close_modal();">Close</a>
</div>

<script>
    function close_modal(){
        document.getElementById('addData').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
    }
</script>

