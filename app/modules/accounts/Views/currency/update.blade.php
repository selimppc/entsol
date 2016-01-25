<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['currency-update', $data->id]]) !!}
    @include('accounts::currency._form')
    {!! Form::close() !!}
</div>
