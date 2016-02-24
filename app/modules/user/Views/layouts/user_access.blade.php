@extends('admin::layouts.master')

<div>
    @section('content')
        <h3>You are not authorized to perform this action! </h3>
</div>
<a href="{{URL::previous()}}" class="btn btn-primary "> Go Back </a>
@stop