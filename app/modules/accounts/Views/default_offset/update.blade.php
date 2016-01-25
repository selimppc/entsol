<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['default_offset-update', $data->id]]) !!}
    @include('accounts::default_offset._form')
    {!! Form::close() !!}
</div>
