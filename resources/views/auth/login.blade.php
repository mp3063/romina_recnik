<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lock</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="/css/lockscreen.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row blank-space">
        <div class="col-lg-12">
            <img src="/img/ghostbusters_mala.jpg" alt="ghost" class="img-responsive"></div>
    </div>
    <div class="text-center">
        <form action="/auth/login" method="post" class="form-inline">
            {!! csrf_field() !!}
            <input type="password" name="password" required class="form-control" placeholder="Sifra">
            <input type="hidden" name="remember">
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>