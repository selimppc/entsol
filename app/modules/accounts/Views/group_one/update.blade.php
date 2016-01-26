<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['group_one-update', $data->id,'class' => 'form-horizontal','id' => 'jq-validation-form']]) !!}
    @include('accounts::group_one._form')
    {!! Form::close() !!}
</div>






