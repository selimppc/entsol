

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    @section('content_update')
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-branch', $data->id]]) !!}
    @include('accounts::branch._form')
    {!! Form::close() !!}
</div>

