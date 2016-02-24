@extends('admin::layouts.master')

<div style="background-image:url('{{ URL::asset("assets/user/img/chain.jpg")}}') ;height: 100%; width: 100%; ">
    @section('content')
        <h3 class="required">You are not authorized to perform this action! </h3>
</div>
<a href="{{URL::previous()}}" class="btn btn-primary "> Go Back </a>
@stop