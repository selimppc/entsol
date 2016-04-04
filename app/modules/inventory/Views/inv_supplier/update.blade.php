
<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    {!! Form::model($model, ['method' => 'PATCH', 'route'=> ['update-inv-supplier', $model->id]]) !!}
       @include('inventory::inv_supplier._form')
    {!! Form::close() !!}
</div>
