@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop

@section('content')

        <!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ $pageTitle }}</span>
            </div>

            <div class="panel-body">
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th> Voucher Number </th>
                            <th> Coa </th>
                            <th> Account Code </th>
                            <th> Title </th>
                            <th> Sub Account Code </th>
                            <th> Currency </th>
                            <th> Exchange Rate </th>
                            <th> Prime Debit </th>
                            <th> Prime Credit </th>
                            <th> Base Debit </th>
                            <th> Base Credit </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{$values->voucher_number}}</td>
                                    <td>{{$values->relChartOfAccounts->title}}</td>
                                    <td>{{$values->account_code}}</td>
                                    <td>{{$values->	title}}</td>
                                    <td>{{$values->	sub_account_code}}</td>
                                    <td>{{$values->relCurrency->title}}</td>
                                    <td>{{$values->exchange_rate}}</td>
                                    <td>{{$values->	prime_debit}}</td>
                                    <td>{{$values->	prime_credit}}</td>
                                    <td>{{$values->	base_debit}}</td>
                                    <td>{{$values->	base_credit}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('payment-voucher')}}"> <i class="fa fa-arrow-circle-left"></i> Back To Payment Voucher</a>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif


@stop