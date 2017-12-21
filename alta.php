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

<!-- ==============================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                             <li><a href="logeo.php"><i class="material-icons left">lock_open</i>Registro</a></li>
                         </ul>
                  </div>
            </nav>
     </header>
<!--otro card panel -->
 <!-- form -->   
     <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">First Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telephone</label>
        </div>
      </div>
    </form>
  </div>
  <!-- form -->
      

         <footer class="card-panel orange center z-depth-4 white-text">Bastiaan Software Center </footer>
   </body>
</html>