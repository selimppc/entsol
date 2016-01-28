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
                <a class="btn btn-xs btn-info pull-right" data-toggle="modal" href="#addData" title="Add">
                    <strong>Add+</strong>
                </a>
            </div>

            <div class="panel-body">

                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th>Voucher Number </th>
                            <th>Chart Of Account </th>
                            <th> Account Code </th>
                            <th> Currency </th>
                            <th> Prime Amount </th>
                            <th> Base Amount </th>
                            <th> Branch </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{isset($values->relVoucherHead->voucher_number)?$values->relVoucherHead->voucher_number:''}}</td>
                                    <td>{{isset($values->relChartOfAccounts->title)?$values->relChartOfAccounts->title:''}}</td>
                                    <td>{{isset($values->relChartOfAccounts->account_code)?$values->relChartOfAccounts->account_code:''}}</td>
                                    <td>{{isset($values->relCurrency->title)?$values->relCurrency->title:''}}</td>
                                    <td>{{$values->prime_amount}}</td>
                                    <td>{{$values->base_amount}}</td>
                                    <td>{{isset($values->relBranch->title)?$values->relBranch->title:''}}</td>
                                    <td>{{ucfirst($values->status)}}
                                      @if($values->status == 'active')&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('status-voucher-head', $values->id) }}" class="" title="Inactivate this Status" onclick="return confirm('Are you sure to Inactive status?')"><i class="fa  fa-minus-square"></i></a>
                                      @else
                                            &nbsp;
                                            <a href="{{ route('status-voucher-head', $values->id) }}" class="" title="Activate This Status" onclick="return confirm('Are you sure to Active status?')"><i class="fa fa-plus-square"></i></a>
                                      @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('view-voucher-detail', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-voucher-detail', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-voucher-detail', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                    <span class="pull-left">{!! str_replace('/?', '?', $data->render()) !!} </span>
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
                <h4 class="modal-title" id="myModalLabel">Add Voucher Head Detail</h4>
            </div>
            <div class="modal-body modal-backdrop">
                {!! Form::open(['route' => 'store-voucher-detail']) !!}
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
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@stop