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
                <span class="panel-title">{{ $pageTitle }} ({{isset($voucher_number)?$voucher_number:''}})</span>
                @if($status !='posted')
                    <a class="btn btn-xs btn-primary pull-right" data-toggle="modal" href="#addData" title="Add">
                       <strong>Add Voucher Detail</strong>
                    </a>
                @endif
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['route' => 'voucher-detail',$id]) !!}
                <div class="col-sm-12">
                    <div class="col-sm-2">
                        {!! Form::text('account_code', Input::old('account_code'), ['id'=>'abcd','class' => 'form-control','placeholder'=>'account code']) !!}

                    </div>
                    <div class="col-sm-2">
                        {!! Form::Select('currency_id',$currency_data, Input::old('currency_id'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                       {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-2 srch-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p> &nbsp;</p>
                {{-------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th>Voucher Number </th>
                            <th>COA(Account Code) </th>
                            <th> Currency (Exchange Rate)</th>
                            <th> Amount </th>
                            <th> Branch </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $values)
                                <tr class="gradeX">
                                    <td>{{isset($values->relVoucherHead->voucher_number)?$values->relVoucherHead->voucher_number:''}}</td>
                                    <td>{{isset($values->relChartOfAccounts->title)?$values->relChartOfAccounts->title:''}}  ({{isset($values->relChartOfAccounts->account_code)?$values->relChartOfAccounts->account_code:''}})</td>
                                    <td>{{isset($values->relCurrency->title)?$values->relCurrency->title:''}} ({{isset($values->relCurrency->exchange_rate)?$values->relCurrency->exchange_rate:''}})</td>
                                    <td>{{$values->base_amount}}</td>
                                    <td>{{isset($values->relBranch->title)?$values->relBranch->title:''}}</td>
                                    <td>{{ucfirst($values->status)}}
                                    </td>
                                    <td>
                                        <a href="{{ route('view-voucher-detail', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="fa fa-eye"></i></a>
                                        @if($status !='posted')
                                        <a href="{{ route('edit-voucher-detail', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-voucher-detail', $values->id) }}" class="btn btn-default btn-xs" onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="fa fa-minus"></i></a>
                                        <a href="{{ route('destroy-voucher-detail', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                         @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
                    {{--<span class="pull-left">{!! str_replace('/?', '?', $model->render()) !!} </span>--}}
                <a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('voucher-head')}}"> <i class="fa fa-arrow-circle-left"></i> Back To Journal Voucher</a>
                <div>
                    @if(isset($voucher_data->status))
                        @if($voucher_data->status != 'balanced')
                            <h4 class="required">
                                * The journal must balance ie. debits equal to credits before it can be processed.
                            </h4>
                        @else
                            <h5>
                                <h4 class="narration">
                                    The journal Balanced.
                                    {{--<a href="">POST to Ledger</a>--}}
                                    <a href="{{route('journal-post',$voucher_number)}}" class="btn btn-success" title="">POST to Ledger</a>
                                </h4>

                            </h5>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<div id="addData" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Journal Voucher Detail # {{isset($voucher_number)?$voucher_number:''}}</h4>
            </div>
            <div class="modal-body modal-backdrop">
                {!! Form::open(['route' => 'store-voucher-detail','id' => 'jq-validation-form']) !!}
                    @include('accounts::voucher_detail._form')
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
{{--
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif
--}}



@stop