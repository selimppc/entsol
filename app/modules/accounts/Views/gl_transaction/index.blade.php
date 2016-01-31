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
                            <th> Reference </th>
                            <th> Date </th>
                            <th> Year </th>
                            <th> Period </th>
                            <th> Branch </th>
                            <th> Coa </th>
                            <th> Title </th>
                            <th> Debit </th>
                            <th> Credit </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{$values->voucher_number}}</td>
                                    <td>{{$values->reference}}</td>
                                    <td>{{$values->date}}</td>
                                    <td>{{$values->	year}}</td>
                                    <td>{{$values->	period}}</td>
                                    <td>{{$values->relBranch->title}}</td>
                                    <td>{{$values->relChartOfAccounts->title}}</td>
                                    <td>{{$values->	title}}</td>
                                    <td>{{$values->	debit}}</td>
                                    <td>{{$values->	credit}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
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