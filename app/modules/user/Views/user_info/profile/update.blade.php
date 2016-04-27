<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-user-profile', $data->id],'files'=>'true']) !!}
             @include('user::user_info.profile._form')
        {!! Form::close() !!}
</div>

