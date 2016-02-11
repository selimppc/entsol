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
                        <a class="btn btn-primary" data-toggle="modal" href="#addTrialBalanceAll">
                            <strong>Trial Balance All</strong>
                        </a>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">General Ledger Transaction</h6>
                        <a class="btn btn-primary" data-toggle="modal" href="#addGlTransaction">
                            <strong>GL Transaction</strong>
                        </a>

                        <hr class="panel-wide">

                        <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">General Ledger Single Voucher</h6>
                        <a class="btn btn-primary" data-toggle="modal" href="#addGlSingleVoucher">
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
                    <a class="btn btn-primary" data-toggle="modal" href="#addGlPnlSheet">
                        <strong>GL Pnl Sheet</strong>
                    </a>

                    <hr class="panel-wide">

                    <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">Chart of Accounts</h6>
                    <a class="btn btn-primary" data-toggle="modal" href="#addChartofAccounts">
                        <strong>Chart of Accounts</strong>
                    </a>

                    <hr class="panel-wide">

                    <h6 class="text-light-gray text-semibold text-xs text-center" style="margin:20px 0 10px 0;">Balance Sheet</h6>
                    <a class="btn btn-primary" data-toggle="modal" href="#addBalanceSheet">
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
            {!! Form::open(['route' => 'trial-balance','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Trial Balance</h4>
            </div>
            <div class="modal-body">
                @include('accounts::reports.trial_balance')
            </div>
            <div class="modal-footer">
                {!! Form::submit('PDF Report', ['name'=>'PDF', 'class' => 'btn btn-primary']) !!}
                {!! Form::submit('Excel Report', ['name'=>'Excel', 'class' => 'btn btn-primary']) !!}
                <a href="{{route('account-reports')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- Modal Trial Balance All -->

<div id="addTrialBalanceAll" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Trial Balance All</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'trial-balance-all','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.trial_balance_all')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal GL Transaction -->

<div id="addGlTransaction" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">General Ledger Transaction</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'gl-transaction','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.gl_transaction')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<!-- Modal GL Single Voucher -->

<div id="addGlSingleVoucher" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">General Ledger Single Voucher</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'gl-single-voucher','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.gl_single_voucher')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<!-- Modal GL Pnl Sheet -->

<div id="addGlPnlSheet" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">General Ledger Profit & Loss Sheet</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'gl-pnl-sheet','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.gl_pnl_sheet')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<!-- Modal Chart of Accounts -->

<div id="addChartofAccounts" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Chart of Accounts</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'chart-of-accounts-report','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.chart_of_accounts_report')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal Balance Sheet -->

<div id="addBalanceSheet" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Balance Sheet</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'balance-sheet','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::reports.balance_sheet')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>



@stop