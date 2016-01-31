<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Tooltip - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
        $(function() {
            $( document ).tooltip();
        });
    </script>

</head>
<body>

{!! Form::text('amount', Input::old('amount'), ['class' => 'form-control','title'=>'For credit add minus sign(-) before numeric digit(s).']) !!}

</body>
</html>