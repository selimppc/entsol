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
                <a class="btn btn-primary btn-xs pull-right" data-toggle="modal" href="#addData" title="Add Settings">
                    <strong>Add Settings</strong>
                </a>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['route' => 'settings']) !!}
                <div class="col-sm-8">
                    <div class="col-sm-4">
                        {!! Form::text('code',Input::old('code'),['class' => 'form-control','placeholder'=>'Code']) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::text('title',Input::old('title'),['class' => 'form-control','placeholder'=>'Title']) !!}
                    </div>
                    <div class="col-sm-3 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button')) !!}
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
                            <th> Code </th>
                            <th> Title </th>
                            <th> Last Number </th>
                            <th> Increment </th>
                            <th> Status </th>
                            <th> Action </th>
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
                                    <td>{{$values->status}}</td>
                                    <td>
                                        <a href="{{ route('view-settings', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-settings', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-settings', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
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


<div id="addData" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Settings Information</h4>
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