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
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>User Login History</em>"></span>
            </div>

            <div class="panel-body">
                {{-------------- Filter :Starts -------------------------------------------}}
                {!! Form::open(['route' => 'search-user-history', 'method'=>'GET']) !!}

                <div id="index-search">
                    <div class="col-sm-2">
                        {!! Form::select('user_id',$user_list, @Input::get('user_id')? Input::get('user_id') : null,['class' => 'form-control','placeholder'=>'type user ', 'title'=>'Type your query by action table, then click "search" button']) !!}

                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('date',@Input::get('date')? Input::get('date') : null,['class' => 'bs-datepicker-component form-control','placeholder'=>'pick a date', 'title'=>'pick a date by clicking here, then click "search" button']) !!}
                    </div>

                    <div class="col-sm-2 filter-btn">
                        {!! Form::submit('Search', array('class'=>'btn btn-primary btn-xs pull-left pop btn-search-height','id'=>'button', 'data-placement'=>'right', 'data-content'=>'click search button for required information')) !!}
                    </div>
                </div>
                <p> &nbsp;</p>
                <p> &nbsp;</p>

                {!! Form::close() !!}

                {{-------------- Filter :Ends -------------------------------------------}}
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th> Modified By</th>
                            <th> Login Time </th>
                            <th> Logout Time </th>
                            <th> IP Address </th>
                            <th> Date </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $values)
                                <tr class="gradeX">
                                    <td>{{ isset($values->relUser->username)?ucfirst($values->relUser->username) :''}} </td>
                                    <td>{{$values->login_time}}</td>
                                    <td>{{$values->logout_time}}</td>
                                    <td>{{$values->ip_address}}</td>
                                    <td>{{$values->date}}</td>
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

<!-- Modal  -->

<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index:1050">
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