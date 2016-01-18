<!DOCTYPE html>
<html>
    <head>
        <title>Enterprise Solution </title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('admin') }}" rel="stylesheet" type="text/css" >

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Enterprise Solution.</div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                       <a href=""> Accounts </a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ URL::asset('assets/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
