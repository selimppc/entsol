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
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all menu panel in this page<br> and add new menu, update, delete from this page</em>">(?)</span>
                <a class="btn btn-primary btn-xs pull-right pop" data-toggle="modal" href="#addData" data-placement="left" data-content="click add new menu button for new menu entry">
                    <strong>Add New Menu</strong>
                </a>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['method' =>'GET','url'=>'/search-menu-panel']) !!}
                <div id="index-search">
                    <div class="col-sm-3">
                        {!! Form::select('menu_type', array(''=>'select menu type','ROOT'=>'ROOT','MODU'=>'MODU','MENU'=>'MENU','SUBM'=>'SUBM'),@Input::get('menu_type')? Input::get('menu_type') : null,['class' => 'form-control', 'title'=>'select your require "menu type", example :: ROOT']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('menu_name',@Input::get('menu_name')? Input::get('menu_name') : null,['class' => 'form-control','placeholder'=>'type menu name', 'title'=>'type your require menu "name", example :: Main Menu, then click "search" button']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('route',@Input::get('route')? Input::get('route') : null,['class' => 'form-control','placeholder'=>'type route name', 'title'=>'type your require route "name", example :: menu-panel, then click "search" button']) !!}
                    </div>

                    <div class="col-sm-2 filter-btn">
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
                            <th> Menu Id </th>
                            <th> Menu Type &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="branch full name">(?)</span></th>
                            <th> Menu Name </th>
                            <th> Route </th>
                            <th> Parent Menu Id </th>
                            <th> Status &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="you can change status from update page">(?)</span></th>
                            <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations<br>delete : click for delete informations">(?)</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $values)
                                <tr class="gradeX">
                                    <td>{{$values->id}}</td>
                                    <td>{{ucfirst($values->menu_type)}}</td>
                                    <td>{{ucfirst($values->menu_name)}}</td>
                                    <td>{{$values->route}}</td>
                                    <td>{{$values->parent_menu_id}}</td>
                                    <td>{{ucfirst($values->status)}}</td>
                                    <td>
                                        <a href="{{ route('view-menu-panel', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-menu-panel', ['id'=>$values->id,'parent_menu_id'=>$values->parent_menu_id]) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-menu-panel', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                <span class="pull-left">{!! str_replace('/?', '?', $model->render()) !!} </span>
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
                <h4 class="modal-title" id="myModalLabel">{{ $pageTitle }} <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-menu-panel','id' => 'jq-validation-form']) !!}
                @include('admin::menu_panel._form')
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


<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@stop