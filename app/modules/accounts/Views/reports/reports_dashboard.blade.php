@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">


                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Bootstrap buttons</span>
                    </div>
                    <div class="panel-body no-padding-t">

                        <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">STATE BUTTONS</h6>
                        <button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">Loading state</button>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">STATE BUTTONS</h6>
                        <button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">Loading state</button>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">STATE BUTTONS</h6>
                        <button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">Loading state</button>

                    </div>
                </div>

        </div>

        <div class="col-sm-6">
            <form action="#" class="panel form-horizontal form-bordered">
                <div class="panel-heading">
                    <span class="panel-title">Part 2</span>
                </div>
                <div class="panel-body no-padding-hr">
                    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                        <div class="row">
                            <label class="col-sm-4 control-label">Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group no-margin-hr no-margin-b panel-padding-h">
                        <div class="row">
                            <label class="col-sm-4 control-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop