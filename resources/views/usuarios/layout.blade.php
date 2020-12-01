<!DOCTYPE html>
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Nekmit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<head>
        <title>Minuta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="{{  asset('layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
    </head>
<body id="top" >
<!-- Top Background Image Wrapper -->
 <div  style="background: url({{asset('images/demo/backgrounds/seguridad.jpg')}}) no-repeat center center fixed;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;">
   <header id="header" class="hoc clear">
   <div id="logo" class="fl_left">
     <h1><a href="index.html"><img src="images/demo/s.png" alt=""></a></h1><br>
   </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
      <li class="active"><a href="index.html">Inicio</a></li>

<li><a class="drop" href="#">Minuta</a>
    <ul>

        <li><a href="visitantes">Visitante</a></li>
        <li><a href="vehiculos">Vehiculo</a></li>
        <li><a href="elementos">Elemento</a></li>
    </ul>

<li><a href="novedades">Novedad</a></li>
<li><a href="#">Iniciar sesión</a></li>

          </ul>
        </li>

    </nav>
  </header>
<div class="container" style="margin-left: 10%; margin-right: 10%;">
@yield('content')
</div>
</div>
<div class="wrapper row4">

</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
            <section id="ctdetails" class="hoc clear">
                <ul class="nospace clear">
                    <li class="one_quarter first">
                        <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Llamanos:</strong> +57 (310) 332 3854</span></div>
                    </li>
                    <li class="one_quarter">
                        <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Envianos un correo:</strong> S_kings2020@gmail.com</span></div>
                    </li>
                    <li class="one_quarter">
                        <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Lunes - Viernes:</strong> 09:00am - 7:00pm</span></div>
                    </li>
                    <li class="one_quarter">
                        <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Ven a visitarnos:</strong>  <a href="">Carrera 8 #2a-94 sur</a></span></div>
                    </li>
                </ul>
            </section>
        </div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{!!  asset('layout/scripts/jquery.min.js') !!}"></script>
<script src="{!!  asset('layout/scripts/jquery.backtotop.js') !!}"></script>
<script src="{!!  asset('layout/scripts/jquery.mobilemenu.js') !!}"></script>
</body>
</html>
