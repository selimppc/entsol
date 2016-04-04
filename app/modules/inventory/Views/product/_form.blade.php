<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('business_id', 'Business') !!}
            <small class="required">(Required)</small>
            {!!Form::select('business_id',$business,Input::old('business_id'),['class'=>'form-control','required','title'=>'Select Business'])  !!}
        </div>
    </div>
</div>


<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title',Input::old('title'),['class' => 'form-control','placeholder'=>'Enter Buyer Title','required','autofocus', 'title'=>'Enter Title']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('code',Input::old('code'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Code']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('product_group_id', 'Product Group') !!}
            <small class="required">(Required)</small>
            {!!Form::select('product_group_id',$product_group,Input::old('product_group_id'),['class'=>'form-control','required','title'=>'Select Product Group'])  !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('product_category_id', 'Product Category') !!}
            <small class="required">(Required)</small>
            {!!Form::select('product_category_id',$product_category,Input::old('product_category_id'),['class'=>'form-control','required','title'=>'Select Product Category'])  !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('cost_price', 'Cost Price:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('cost_price',Input::old('cost_price'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter cost price']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('purchase_unit', 'Purchase Unit:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('purchase_unit',Input::old('purchase_unit'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Purchase Unit']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('purchase_unit_qty', 'Purchase Unit Qty:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::input('number','purchase_unit_qty',Input::old('purchase_unit_qty'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Purchase Unit Qty','min'=>'1']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">


    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-4">
            {!! Form::label('stock_type', 'Stock Type') !!}
            <small class="required">(Required)</small>
            {!! Form::select('stock_type', array('stock'=>'Stock','non-stock'=>'Non Stock'),Input::old('stock_type'),['class' => 'form-control','required','title'=>'select stock type']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('stock_unit', 'Stock Unit:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('stock_unit',Input::old('stock_unit'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Stock Unit']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::label('stock_unit_qty', 'Stock Unit Qty:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::input('number','stock_unit_qty',Input::old('stock_unit_qty'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Stock Unit Qty','min'=>'1']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class' => 'form-control','required','title'=>'select status of menu panel']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', Input::old('description'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('image', 'Product Image:', ['class' => 'control-label']) !!}
            <p class="narration">System will allow these types of image(png,gif,jpeg,jpg Format) </p>
            @if(isset($model['image']))
                <img src="{{ URL::to($model->image) }}" width="100px" height="100px">
            @endif
            {!! Form::file('image',Input::old('image'), [ 'class' => 'form-control','required','title'=>'Add Product Image only png,gif,jpeg,jpg Format']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save information']) !!}&nbsp;
    <a href="{{route('product')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

