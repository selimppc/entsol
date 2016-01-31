@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop

@section('content')

    <div class="panel-body">
        {{-------------- Filter :Starts -------------------------------------------}}
        {!! Form::open(['route' => 'search']) !!}
        <div class="col-sm-12">
            <div class="col-sm-2">
                {!! Form::text('account_code', Input::old('account_code'), ['id'=>'abcd','class' => 'form-control','placeholder'=>'account code']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

<script type="text/javascript">

    $('[id="abcd"]').click(function(e) {
        alert("The paragraph was clicked.");
    });


</script>

@stop