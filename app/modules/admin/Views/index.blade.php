@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Title</span>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" id="jq-validation-form">
                        <div class="form-group">
                            <label for="jq-validation-required" class="col-sm-3 control-label">Required</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-required" name="jq-validation-required" placeholder="Required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jq-validation-select" class="col-sm-3 control-label">Select Box</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="status" name="status">
                                    <option value="">Select gear...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop