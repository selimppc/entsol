
<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    {!! Form::model($model, ['method' => 'PATCH', 'route'=> ['update-product-category', $model->id]]) !!}
       @include('inventory::product_category._form')
    {!! Form::close() !!}
</div>
