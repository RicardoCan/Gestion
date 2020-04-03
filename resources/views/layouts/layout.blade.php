<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta name="route" value="{{url('/')}}">
    <title>@yield('titulo')</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <script type="text/javascript" src="js/vue.js"></script>
     <script src="js/jquery.min.js"></script>

    
  </head>
  <body background="Img/blurry_abstract-2560x1600.jpg">
    @yield('contenido')



    @stack('scripts')

    <script src="js/bootstrap.min.js"></script>

  </body>
</html>