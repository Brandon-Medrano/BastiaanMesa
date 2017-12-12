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

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<!-- ==============================basttiaan===========================================-->

<script language="JavaScript" type="text/javascript" src="js/librerias/jquery-1.6.2.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/librerias/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/json2.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/AjaxContextHandler.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/Ajaxv2.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/prototype.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/funcionesFechas.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/funciones.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/funcionesColores.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/constantes.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/Eventos.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/Base.js"></script> 

	<script language="JavaScript" type="text/JavaScript" src="js/librerias/cargador.js"></script>
<!-- 	<script language="JavaScript" type="text/JavaScript" src="js/librerias/jquery.min.js"></script> -->
 	<script language="JavaScript" type="text/JavaScript" src='js/librerias/Datapickerjs/ui.core.js'></script>
	<script language="JavaScript" type="text/JavaScript" src='js/librerias/Datapickerjs/ui.datepicker.js'></script>
	<script language="JavaScript" type="text/JavaScript" src='js/librerias/Datapickerjs/ui.datepicker-es.js'></script> 
	
	<script language="JavaScript" type="text/JavaScript" src="js/componentes/GridReg.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/componentes/Combo.js"></script>


<!-- ================================bastiaan=========================================-->

 <script language="JavaScript" type="text/JavaScript" src="js/repositorios/tickets_repositorio.js"></script>
 <script language="JavaScript" type="text/JavaScript" src="js/presentadores/tickets_presentador.js"></script>
 <script language="JavaScript" type="text/JavaScript" src="js/vistas/tickets_vista.js"></script>



<!-- ==============================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- =========================================================================================-->
<title>Bastian Software Center</title>
</head>

<body onLoad="vista.onLoad()" style="padding-left:3%; padding-right:3%">
  <div class="card-panel White z-depth-4">
       <header>
             <nav>
                  <div class="nav-wrapper  grey darken-2 accent-3 z-depth-4">
                       <a href="#!" class="brand-logo">Logo</a>
                       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                          <ul class="right hide-on-med-and-down">
                             <li><a href="logeo.php"><i class="material-icons left">lock_open</i>Registro</a></li>
                         </ul>
                  </div>
            </nav>
     </header>
<!--otro card panel -->
 <!-- form -->   
<!-- 
     <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s3">
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">First Name</label>
        </div>
        <div class="input-field col s3">
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telephone</label>
        </div>
         <div class="input-field col s3">
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telephone</label>
        </div>
      </div>
    </form>
  </div>
   -->
  <!-- form -->
 <div id="principalDiv" class="row">
     <div id="actividad" class="col s12 m4 l2"></div>
     <div id="usuarioSol" class="col s12 m4 l8"></div>
     <div id="fInicial" class="col s12 m4 l2"></div>
     <div id="fFinal" class="col s12 m4 l2"></div>
     <div id="estado" class="col s12 m4 l2"></div>
  </div>
  
<!-- 
  <div class="row">
    <div class="col s12 m6 l3"><p>s12 m6 l3</p></div>
    <div class="col s12 m6 l3"><p>s12 m6 l3</p></div>
    <div class="col s12 m6 l3"><p>s12 m6 l3</p></div>
    <div class="col s12 m6 l3"><p>s12 m6 l3</p></div>
   -->    

         <footer class="card-panel orange center z-depth-4 white-text">Bastiaan Software Center </footer>
   </body>
</html>