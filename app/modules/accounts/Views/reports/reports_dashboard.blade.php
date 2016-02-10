@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')
<div class="row">
    <div class="col-sm-6">
            <div class="panel">
                <div id="report-button">
                    <div class="panel-heading">
                        <span class="panel-title">Report Buttons</span>
                    </div>
                    <div class="panel-body no-padding-t text-center">
                        <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">Trial Balance</h6>
                        <a class="btn btn-primary" data-toggle="modal" href="#addTrialBalance">
                            <strong>Trial Balance</strong>
                        </a>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">Trial Balance All</h6>
                        <a class="btn btn-primary" data-toggle="modal" href="#addData">
                            <strong>Trial Balance All</strong>
                        </a>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">General Ledger Transaction</h6>
                        <a class="btn btn-primary" data-toggle="modal" href="#addData">
                            <strong>GL Transaction</strong>
                        </a>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">General Ledger Single Voucher</h6>
                        <a class="btn btn-primary" data-toggle="modal" href="#addData">
                            <strong>GL Single Voucher</strong>
                        </a>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-sm-6">
        <div class="panel">
            <div id="report-button">
                <div class="panel-heading">
                    <span class="panel-title">Report Buttons</span>
                </div>
                <div class="panel-body no-padding-t text-center">

                    <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">General Ledger Profit and Loss Statement</h6>
                    <a class="btn btn-primary" data-toggle="modal" href="#addData">
                        <strong>GL Pnl Sheet</strong>
                    </a>

                    <hr class="panel-wide">

                    <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">Chart of Accounts</h6>
                    <a class="btn btn-primary" data-toggle="modal" href="#addData">
                        <strong>Chart of Accounts</strong>
                    </a>

                    <hr class="panel-wide">

                    <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">Balance Sheet</h6>
                    <a class="btn btn-primary" data-toggle="modal" href="#addData">
                        <strong>Balance Sheet</strong>
                    </a>

                    <hr class="panel-wide">

                    <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">pending to generate...</h6>
                    <a class="btn btn-primary" data-toggle="modal" href="#addData">
                        <strong>pending to generate..</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Trial Balance  -->

<div id="addTrialBalance" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Trial Balance</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'trial-balance','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.trial_balance')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>







@stop