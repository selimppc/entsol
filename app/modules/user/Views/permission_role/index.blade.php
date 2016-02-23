@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop

@section('content')

<!-- form open for batch delete -->
{!!  Form::open(['route' => ['delete-permission-role']]) !!}
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all permission in this page<br> and add new permission, update from this page</em>">(?)</span>
                <a class="btn btn-primary btn-xs pull-right pop" data-toggle="modal" href="#addData" data-placement="left" data-content="click add permission role button for new permission of a role">
                    <strong>Add New Permission Role</strong>
                </a>
                <input type="submit" id="deleteBatch" class="btn btn-primary btn-xs" value="Delete Selected Permission Role" style="display: none;">
                <a class="btn btn-primary btn-xs pull-right pop" href="{{route('index-permission')}}" data-placement="left" data-content="Back to Permission Page" style="margin-right: 10px;">
                    <strong>Back</strong>
                </a>
            </div>


            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {{--{!! Form::open(['method' =>'GET','url'=>'/index-permission-role']) !!}
                <div id="index-search">
                    <div class="col-sm-3">
                        {!! Form::text('role_name',@Input::get('role_name')? Input::get('role_name') : null,['class' => 'form-control','placeholder'=>'type role name', 'title'=>'type your require role "name", example :: Admin, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-2 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button', 'data-placement'=>'right', 'data-content'=>'type role name in specific field then click search button for required information')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p> &nbsp;</p>
                <p> &nbsp;</p>--}}

                {{-------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table id="jq-datatables-example" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th> Role </th>
                            <th> Permission </th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details information<br>update : click for update information">(?)</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td><input type="checkbox" name="pr_ids[]" value="{{ $values->id }}"></td>
                                    <td>{{ucfirst($values->relRole->title)}}</td>
                                    <td>{{ucfirst($values->relPermission->title)}}</td>
                                    <td>
                                        <a href="{{ route('view-permission-role', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('delete-permission-role', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
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
<!-- form close for bathc delete -->
{!! Form::close() !!}

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Permission Role Information <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-permission-role','id' => 'jq-validation-form']) !!}
                @include('user::permission_role._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- modal -->
<script>

    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
        if($(this).prop("checked") == true){
            $("#deleteBatch").show();
        }
        else{
            $("#deleteBatch").hide();
        }
    });
    $("table input:checkbox").on('change',function(){
        if($(this).prop("checked") == true){
            $("#deleteBatch").show();
        }
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