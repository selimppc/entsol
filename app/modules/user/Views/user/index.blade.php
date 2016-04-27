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
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all user in this page<br> and add new user, update, delete from this page</em>">(?)</span>
                <a class="btn btn-primary btn-xs pull-right pop" data-toggle="modal" href="#addData" data-placement="left" data-content="click 'add user' button to add new user">
                    <strong>Add User</strong>
                </a>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['method' =>'GET','route'=>'search-user']) !!}
                <div class="col-sm-12">
                    <div class="col-sm-2">
                        {!! Form::text('username', @Input::get('username')? Input::get('username') : null, ['class' => 'form-control','placeholder'=>'select username','title'=>'type your require "username" then click "search" button']) !!}

                    </div>
                    <div class="col-sm-3">
                        {!! Form::Select('branch_id',$branch_data, @Input::get('branch_id')? Input::get('branch_id') : null,['class' => 'form-control', 'title'=>'select your require "branch", example :: Main Branch, then click "search" button']) !!}
                    </div>

                    <div class="col-sm-2">
                        {!! Form::Select('status',array(''=>'Status','inactive'=>'Inactive','active'=>'Active','cancel'=>'Cancel'),@Input::get('status')? Input::get('status') : null,['class'=>'form-control', 'title'=>'select your require "status", example :: open, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-3 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button', 'data-placement'=>'right', 'data-content'=>'type user name or select branch or both in specific field then click search button for required information')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p> &nbsp;</p>

                {{------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            {{--<th> id </th>--}}
                            <th> Username </th>
                            <th> Email </th>
                            <th> Branch </th>
                            <th> Status &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="you can change status from update page">(?)</span></th>
                            <th> Expire Date </th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations<br>delete : click for delete informations">(?)</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $values)
                                <tr class="gradeX">
                                    <td>{{ucfirst($values->username)}}</td>
                                    <td>{{$values->email}}</td>
                                    <td>{{isset($values->relBranch->title)?ucfirst($values->relBranch->title):''}}</td>
                                    <td>{{ucfirst($values->status)}}</td>
                                    <td>{{$values->expire_date}}</td>
                                    <td>
                                        <a href="{{ route('show-user', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view" onclick="open_modal();"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-user', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update" onclick="open_modal();"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-user', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete" onclick="open_modal();"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <span class="pull-right">{!! str_replace('/?', '?',  $model->appends(Input::except('page'))->render() ) !!} </span>
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
                <h4 class="modal-title" id="myModalLabel">Add User Informations <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'add-user','id' => 'jq-validation-form']) !!}
                @include('user::user._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- modal -->

<script>
    function open_modal(){
        document.getElementById('load').style.visibility="visible";
    }
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