<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/css/estilos.css">
    <link rel="stylesheet" href="css/css/fonts.css">
    
   
  </head>
  <body background="Img/back.jpg">
    <div class="contenedor">

      <header>
        <h1 class="title">GDC</h1>
        <a href="regis">Registrate</a>
      </header>
      <div class="login">
        <article class="fondo">
          <img src="Img/men.jpg" alt="User">
          <h3>Inicio de Sesión</h3>
          <form action="{{url('login')}}" method="post">
            @csrf
            <span class="icon-user"></span><input class="inp" type="text" name="usuario"><br>
            <span class="icon-key"></span><input class="inp" type="password" name="password"><br>
         
            <input class="boton" type="submit" name="inicio" value="Ingresar">
          </form>
        </article>
      </div>

    </div>
  </body>
</html>
