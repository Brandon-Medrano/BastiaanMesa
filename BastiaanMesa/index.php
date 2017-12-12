<?php
include 'php/clases/Utilidades.php';

$modulo = REQUEST('CNMDLSID');
$opcionTerminal = REQUEST('CNOTRMID');
$version = REQUEST('CNOTRMVER');

$usuario = REQUEST('CNUSERID');
$nomTrabajador = REQUEST('CNUSERDESC');
$usuarioDsc = REQUEST('CNUSERDESC');
$CNUSERDESC = REQUEST('CNUSERDESC');

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<!-- =========================================================================-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/lightbox.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<!-- ==============================================================================-->

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<!-- ============================  stilo del cuerpo  ==========================================-->
<style>

html {
    font-family: GillSans, Georgia, Trebuchet, sans-serif;
}



</style>

<!-- =========================================================================================-->
<title>Bastian Software Center</title>
</head>

<body  style="padding-left:3%; padding-right:3%">
<div class="card-panel White z-depth-4">
<header>
<nav>
<div class="nav-wrapper  grey darken-2 accent-3 z-depth-4">
<a href="#!" class="brand-logo">Logo</a>
<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
<ul class="right hide-on-med-and-down">

<!-- <li><a href=""><i class="material-icons left">contact_phone</i></i>Contactanos</a></li>

-->
<li><a href="logeo.php"><i class="material-icons left">lock_open</i>Registro</a></li>

</ul>
</div>
</nav>
</header>

<!--otro card panel -->


<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<div class="col s9">
<div class="card-panel white z-depth-4">
<section id="contact">
<div class="container">
<div class="row">
<h2>Solicitud de Tiket</h2>

</div>
</div>
<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
<div class="row">
<div class="col-sm-6">
<form id="main-contact-form" name="contact-form" method="post" action="#">
<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

<div class="col-sm-4">
<div class="form-group">
<input class="input"  type="date" id="" descripcion="fecha"/>
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
<input class="input"  step="000001"  type="time" id="" descripcion="hora"/>
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
<input class="input" value="solicitado" type="" id="" descripcion="Estatus"/>
</div>
</div>

</div>

<div class="row">

<div class="col-sm-6">
<div class="form-group">
<label color: #369;> Proyecto:</label>
<input   class="flow-text" type="text" name="proyecto" placeholder="fonacot" disabled>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<input   class="flow-text" type="nivel" name="email" placeholder="Baja" disabled>
</div>
</div>

<div class="row">


<div class="col-sm-3">
<div class="form-group">
<label for=""> Solicitante:</label>
<input   class="flow-text" type="email" name="email" value="Germain Andrade espinoza"  disabled>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="">Area:</label>
<input   class="flow-text" type="text" name="email" value="inbound" disabled>
</div>
</div>


<div class="col-sm-3">
<div class="form-group">
<label for=""> correo:</label>
<input   class="flow-text" type="email" name="email" value="ing.brandon.medrano@gmail.com"  disabled>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for=""> Asigna:</label>
<input   class="flow-text" type="text" name="campana" placeholder="Jair Mendez" disabled>
</div>
</div>







<div class="col-sm-12">
<div class="form-group">
<label for="">Asunto:</label>
<input   class="flow-text" type="email" name="email" value="">
</div>
</div>



</div>




<div class="form-group">
<textarea name="message" id="message" class="form-control" rows="4" placeholder="Descripcion de tiket" required="required"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn-submit">Enviar</button>
</div>
</form>
</div>

</div>

</section>

</div>
</div>
</div>




</div>



<!-- ///////////////////////////////////////////////////////////////////////////////// -->




<!--losjs -->

<script type="text/javascript" src="./d3.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>


<script type="text/javascript" src="js/materialize.min.js"></script>


<script>
$(document).ready(function(){
    $('.collapsible').collapsible();
});
    
    </script>
    
    
    <script>
    $(document).ready(function(){
        $('.slider').slider({full_width: true});
    });
        </script>
        
        <!-- fin -->
        <!--Inicializaciòn de parallax -->
        <script>
        $(document).ready(function(){
            $('.parallax').parallax();
        });
            </script>
            <!-- fin -->
            
            <!--- -->
            <script>
            $( document ).ready(function(){
                $(".button-collapse").sideNav();
            });
                
                </script>
                <!--ofertas -->
                <script>
                var options = [
                {selector: '.class', offset: 200, callback: customCallbackFunc},
                {selector: '.other-class', offset: 200, callback: function() {
                    customCallbackFunc();
                } },
                ];
                Materialize.scrollFire(options);
                
                </script>
                
                <!-- -->
                
                
                
                
                
                
                <!--ofertas -->
                <script>  var options = [ {selector: '#staggered-test', offset: 50, callback: function(el) { Materialize.toast("This is our ScrollFire Demo!", 1500 ); } }, {selector: '#staggered-test', offset: 205, callback: function(el) { Materialize.toast("Please continue scrolling!", 1500 ); } }, {selector: '#staggered-test', offset: 400, callback: function(el) { Materialize.showStaggeredList($(el)); } }, {selector: '#image-test', offset: 500, callback: function(el) { Materialize.fadeInImage($(el)); } } ]; Materialize.scrollFire(options);
                </script>
                
                <!-- -->
                <!--cierre ->
                <!cuerpo  fin -->
                
                <footer class="card-panel black center z-depth-4 white-text">Bastiaan Software Center </footer>
                </body>
                
                
                </html>