<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Autocomplete functionality</title>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

    <!-- Javascript -->
    <script>

        $(document).ready(function(){
            $("#auto-search-ac").autocomplete({
                source: "{{Route('coa-list')}}",
                minLength: 2,
            });
        });

    </script>
</head>
<body>
<!-- HTML -->
<div class="">
    {!! Form::label('account_code', 'Account Code:', ['class' => 'control-label']) !!}
    {!! Form::text('account_code', Input::old('account_code'), ['id'=>'auto-search-ac','class' => '']) !!}
</div>

</body>
</html>