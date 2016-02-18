@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')

<form action="#" class="panel form-horizontal">
    <div class="panel-heading">
        <span class="panel-title">Horizontal form</span>
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-4 control-label">Name:</label>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">Email:</label>
            <div class="col-sm-8">
                <input type="email" name="email" class="form-control">
            </div>
        </div>
    </div>
    <div class="panel-footer text-right">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>

@stop