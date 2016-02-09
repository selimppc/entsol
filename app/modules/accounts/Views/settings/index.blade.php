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
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>system generated voucher number prefix (journal voucher page) entry from this page,<br>voucher number start from last number<br>and increment number used for next number generate</em>">(?)</span>
                <a class="btn btn-primary btn-xs pull-right" data-toggle="modal" href="#addData" data-placement="left" data-content="click add settings button for new settings entry">
                    <strong>Add Settings</strong>
                </a>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['method' =>'GET','url'=>'/settings']) !!}
                <div id="index-search">
                    <div class="col-sm-3">
                        {!! Form::text('code',@Input::get('code')? Input::get('code') : null,['class' => 'form-control','placeholder'=>'type code', 'title'=>'type your required settings "code", example :: -JV, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('title',@Input::get('title')? Input::get('title') : null,['class' => 'form-control','placeholder'=>'type title', 'title'=>'type your required settings "title", example :: journal voucher, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-2 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button', 'data-placement'=>'top', 'data-content'=>'type code or title or both in specific field then click search button for required information')) !!}
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
                            <th> Type </th>
                            <th> Code &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="code use for voucher number prefix">(?)</span></th>
                            <th> Title </th>
                            <th> Last Number </th>
                            <th> Increment </th>
                            <th> Status &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="you can change status from update page">(?)</span></th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations<br>delete : click for delete informations">(?)</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{ucfirst($values->type)}}</td>
                                    <td>{{$values->code}}</td>
                                    <td>{{$values->title}}</td>
                                    <td>{{$values->last_number}}</td>
                                    <td>{{$values->increment}}</td>
                                    <td>{{ucfirst($values->status)}}</td>
                                    <td>
                                        <a href="{{ route('view-settings', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-settings', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-settings', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
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


<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Settings Information <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-settings','class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('accounts::settings._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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