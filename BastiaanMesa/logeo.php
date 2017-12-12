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
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="css/materialize.min.css">

<title>Basstian</title>
</head>
<body  style="padding-left:10%; padding-right:10%">
     <div class="row">
         <div class="col s12">
              <header align="center" class="card-panel orange darken-2 accent-3 z-depth-4">
                    <h1 class="white-text">Bastiaan Tiket</h1>
              </header>
         </div>
     </div>
<!-- fomluario -->
<form class="form-horizontal" method="POST" action="">
     <div class="card-panel white z-depth-4">
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">ID USUARIO</label>
                   <div class="col-sm-10">
                       <input type="" class="form-control" name="usuario" placeholder="ID User" >
                  </div>
          </div>
<!-- Otro-->
<div class="form-group">
     <label for="inputPassword3" class="col-sm-2 control-label">CONTRASEÑA</label>
          <div class="col-sm-10">
              <input type="password" class="form-control" name="contra"  placeholder="Password" >
         </div>
</div>
<!--otro -->
<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                  <label>
                        <input type="checkbox"> Remember me
                 </label>
             </div>
        </div>
</div>
      <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
           </div>
     </div>
</form>
</body>
<footer align="center">Bastiaan Software Center @Derechos Reservados</footer>
</html>
