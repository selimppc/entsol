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
                <h4 class="text-center">{{ isset($pageTitle)?$pageTitle:'Requisition Information' }}</h4>
            </div>

            {!! Form::open(['route' => 'store-requisition-head']) !!}

            <div class="panel-body">
                <p class="panel-title"><h5 class="req-margin">Requisition Head Information</h5></p>
                <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                    <div class="row">
                        <div class="col-sm-4">
                            {!! Form::label('business_id', 'Business') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('business_id',$business,Input::old('business_id'),['class'=>'form-control','required','title'=>'Select Business'])  !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('req_no', 'Requisition No #', ['class' => 'control-label']) !!}
                            <small class="required">(Required)</small>
                            {!! Form::text('req_no',Input::old('req_no'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Requisition No']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('requisition_type', 'Requisition Type') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('requisition_type',array(''),Input::old('requisition_type'),['class'=>'form-control','required','title'=>'Select Requisition Type'])  !!}
                        </div>
                    </div>
                </div>
                <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                    <div class="row">
                        <div class="col-sm-4">
                            {!! Form::label('supplier_id', 'Supplier') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('supplier_id',$supplier,Input::old('supplier_id'),['class'=>'form-control','required','title'=>'Select Supplier'])  !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('store_id', 'Store') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('store_id',$store,Input::old('store_id'),['class'=>'form-control','required','title'=>'Select Store'])  !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('buyer_id', 'Buyer') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('buyer_id',$buyer,Input::old('buyer_id'),['class'=>'form-control','required','title'=>'Select Buyer'])  !!}
                        </div>
                    </div>
                </div>
                <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                    <div class="row">
                        <div class="col-sm-4">
                            {!! Form::label('buyer_order_no', 'Buyer Order No') !!}
                            <small class="required">(Required)</small>
                            {!! Form::text('buyer_order_no',Input::old('buyer_order_no'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Buyer Order No']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('buyer_order_qty', 'Buyer Order Qty') !!}
                            <small class="required">(Required)</small>
                            {!!Form::input('number','buyer_order_qty',Input::old('buyer_order_qty'),['class'=>'form-control','required','title'=>'Enter Buyer Order Qty','min'=>'0'])  !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('status', 'Status') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('status',['active'=>'Active','cancel'=>'Cancel','approved'=>'Approved'],Input::old('status'),['class'=>'form-control','required','title'=>'Select Status'])  !!}
                        </div>
                    </div>
                </div>
            </div>

        {{----------------  Requisition Details -----------------------------------------------------}}
            <div class="panel-body">
                <p class="panel-title"><h5 class="req-margin">Requisition Details Information</h5></p>
                <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                    <div class="row">
                        <div class="col-sm-4">
                            {!! Form::label('product_id', 'Product') !!}
                            <small class="required">(Required)</small>
                            {!!Form::select('product_id',$product,Input::old('product_id'),['class'=>'form-control','required','title'=>'Select Product'])  !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('unit', 'Unit ', ['class' => 'control-label']) !!}
                            <small class="required">(Required)</small>
                            {!! Form::text('unit',Input::old('unit'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Unit']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('qty', 'Qty') !!}
                            <small class="required">(Required)</small>
                            {!! Form::text('qty',Input::old('qty'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Quantity']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save journal voucher information']) !!}&nbsp;
                <a href="{{route('requisition-head')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- page end-->

@stop