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
            $("#auto-search-ac").change(function(){
                var account_code = $(this).val();
                $.ajax({
                    url: '{{Route('coa-list')}}',
                    type: 'POST',
                    data: {_token: '{!! csrf_token() !!}',account_code: account_code },
                    success: function(data)
                    {
                       // alert(data);
                    }
                });
         });
        });



    </script>
</head>
<body>
<!-- HTML -->
<div class="ui-widget">
    {!! Form::label('account_code', 'Account Code:', ['class' => 'control-label']) !!}
    {!! Form::text('account_code', Input::old('account_code'), ['id'=>'auto-search-ac','class' => 'form-control']) !!}
</div>
</body>
</html>