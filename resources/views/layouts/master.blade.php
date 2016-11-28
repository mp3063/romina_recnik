<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RomininDnevnik</title>

    <!-- Bootstrap -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    {{--<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>--}}

    <style>
        body {
            padding-top: 60px;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

{{--Pocetak--}}
{{--========================================================================--}}

@include('partials.navigation')
@include('partials.modal_insert')
@include('partials.modal_new_dictionary')
@yield('content')

{{--=======================================================================--}}
{{--Kraj--}}

<!-- jQuery -->

<script src="/js/app.js"></script>
<script src="/js/all.js"></script>
<script src="/js/main.js"></script>
</body>
</html>