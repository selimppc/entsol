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
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>journal voucher page contain :<br>journal type<br>auto generated voucher number<br>journal date, year, period<br>and branch name</em>">(?)</span>
                <a class="btn btn-xs btn-primary pull-right" data-toggle="modal" href="#addData" data-placement="left" data-content="click add journal voucher button for new journal voucher entry">
                    <strong>Add Journal Voucher</strong>
                </a>
            </div>

            <div class="panel-body">
    {{-------------- Filter :Starts -------------------------------------------}}
                    {!! Form::open(['method' => '','route' => 'voucher-head']) !!}
                    <div class="col-sm-12">
                        {{--<div class="col-sm-3">
                            {!! Form::Select('account_type',array(''=>'Select Account Type','account-payable'=>'Account Payable','account-receivable'=>'Account Receivable','account-adjustment'=>'account Adjustment','journal-voucher'=>'Journal Voucher','receipt-voucher'=>'Receipt Voucher','reverse-entry'=>'Reverse Entry'),Input::old('account_type'),['class'=>'form-control', 'title'=>'select your require  journal voucher "account type", example :: account payable, then click "search" button']) !!}
                        </div>--}}
                        <div class="col-sm-2">
                            {!! Form::text('voucher_number', Input::old('voucher_number'),['class' => 'form-control','placeholder'=>'type voucher number', 'title'=>'type your require "voucher number", example :: JV-0000001, then click "search" button']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::Select('branch_id',$branch_data, Input::old('branch_id'),['class' => 'form-control', 'title'=>'select your require "branch", example :: Main Branch, then click "search" button']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::selectrange('year', 2016,2030, Input::old('year'),['class' => 'form-control', 'title'=>'select your require "year", example :: 2016, then click "search" button']) !!}
                        </div>

                        <div class="col-sm-4 srch-btn">
                            {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs', 'data-placement'=>'right', 'data-content'=>'type voucher or select branch or both in specific field then click search button for required information')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <p> &nbsp;</p>


    {{-------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th> Voucher Number &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="left" data-content="<em>these are system generated unique voucher number<br>click voucher number to go voucher details page</em>">(?)</span></th>
                            <th> Date </th>
                            <th> Reference </th>
                            <th> Year </th>
                            <th> Period </th>
                            <th> Branch </th>
                            <th> Note </th>
                            <th> Status </th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="1. when status open/suspend/balanced you can view, update, delete all actions<br>2. when status posted you can only view information">(?)</span></th>
                            <th> V.Details &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="left" data-content="<em>click voucher details to go voucher details page</em>">(?)</span></th>
                            <th> Reports </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $values)
                                <tr>
                                    <td>
                                        <a href="{{ route('voucher-detail',['id'=>$values->id,'voucher_number'=>$values->voucher_number]) }}" class="link-text-decoration" title="click for voucher-detail page"><strong>{{$values->voucher_number}}</strong></a>
                                    </td>
                                    <td>{{$values->date}}</td>
                                    <td>{{$values->reference}}</td>
                                    <td>{{$values->year}}</td>
                                    <td>{{$values->period}}</td>
                                    <td>{{isset($values->relBranch->title)?$values->relBranch->title:''}}</td>
                                    <td>{{$values->note}}</td>
                                    <td>{{ ucfirst($values->status) }}</td>
                                    <td>
                                        @if($values->status == 'posted')
                                            <a href="{{ route('view-voucher-head', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        @else
                                            <a href="{{ route('view-voucher-head', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('edit-voucher-head', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('delete-voucher-head', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('voucher-detail',['id'=>$values->id,'voucher_number'=>$values->voucher_number]) }}" class="btn btn-info btn-xs" data-placement="top" data-content="voucher details">v-details</a>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                    {{--<span class="pull-left">{!! str_replace('/?', '?', $model->render()) !!} </span>--}}
            </div>

        </div>
    </div>
</div>
<!-- page end-->

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Journal Voucher Informations &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>system fill account type and voucher number <br> Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'voucher-head-store','id' => 'jq-validation-form']) !!}
                @include('accounts::voucher_head._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index:1151 !important;">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- modal -->


<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });

    </script>
@endif

@stop