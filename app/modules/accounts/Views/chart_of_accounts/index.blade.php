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
                <span class="panel-title">{{ $pageTitle }}</span></span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we add new chart of accounts entry <br> update and delete chart of accounts<br> from this page</em>">(?)</span>
                <a class="btn btn-primary btn-xs pull-right" data-toggle="modal" href="#addData" data-placement="left" data-content="click add COA button for new chart of accounts entry">
                    <strong>Add COA</strong>
                </a>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['method' =>'GET','route'=>'chart-of-accounts']) !!}
                <div id="index-search">
                    <div class="col-sm-2">
                        {!! Form::text('account_code',@Input::get('account_code')? Input::get('account_code') : null,['class' => 'form-control','placeholder'=>'account code', 'title'=>'type your require "Account Code", example :: 101-004']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('title',@Input::get('title')? Input::get('title') : null,['class' => 'form-control','placeholder'=>'type title', 'title'=>'type your require "title", example :: Medical & Lab equipment']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('account_type', array(''=>'select account type','asset'=>'Asset','liability'=>'Liability','income'=>'Income','expenses'=>'Expenses','revenues'=>'Revenues'),@Input::get('account_type')? Input::get('account_type') : null,['class' => 'form-control', 'title'=>'select your require "account type", example :: Asset']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('account_usage', array(''=>'select account usage','ledger'=>'Ledger','ap'=>'Ap','ar'=>'Ar'),@Input::get('account_usage')? Input::get('account_usage') : null,['class' => 'form-control', 'title'=>'select your require "account usage", example :: Leger']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('group_one_id', $group_one_id,@Input::get('group_one_id')? Input::get('group_one_id') : null,['class' => 'form-control', 'title'=>'select your require "Group", example :: Cash & Bank']) !!}
                    </div>
                    <div class="col-sm-1 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button', 'data-placement'=>'right', 'data-content'=>'type code or title or both in specific field then click search button for required information')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p> &nbsp;</p>
                <p> &nbsp;</p>

                {{-------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th> Account Code </th>
                            <th> Title &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="chart of accounts full name">(?)</span></th>
                            <th> Account Type </th>
                            <th> Account Usage </th>
                            <th> Group One Title </th>
                            <th> Branch Title </th>
                            <th> Status&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="you can change status from update page">(?)</span></th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations<br>delete : click for delete informations">(?)</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{$values->account_code}}</td>
                                    <td>{{$values->title}}</td>
                                    <td>{{ucfirst($values->account_type)}}</td>
                                    <td>{{ucfirst($values->account_usage)}}</td>
                                    <td>{{$values->relGroupOne->title}}</td>
                                    <td>{{$values->relBranch->title}}</td>
                                    <td>{{ucfirst($values->status)}}</td>
                                    <td>
                                        <a href="{{ route('view-chart-of-accounts', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view" onclick="open_modal();"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-chart-of-accounts', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update" onclick="open_modal();"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-chart-of-accounts', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete" onclick="open_modal();"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                <span class="pull-right">{!! str_replace('/?', '?',  $data->appends(Input::except('page'))->render() ) !!} </span>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">{{ $pageTitle }} &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-chart-of-accounts','id' => 'jq-validation-form']) !!}
                @include('accounts::chart_of_accounts._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- modal -->
<script>
    function open_modal(){
        document.getElementById('load').style.visibility="visible";
    }

    $('#jq-validation-form').submit(function() {
        $('#gif').css('visibility', 'visible');
        //return true;
    });


</script>

<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@stop