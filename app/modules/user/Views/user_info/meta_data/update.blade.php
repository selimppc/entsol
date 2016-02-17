

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-meta-data', $data->id],'files'=>'true']) !!}
         @include('user::user_info.meta_data._form')
    {!! Form::close() !!}
</div>

