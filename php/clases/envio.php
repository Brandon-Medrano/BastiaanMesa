<?php

//$correo = REQUEST('correo');
$fecha= date("d-m-Y");
$destino = "ing.brandon.medrano@gmail.com";
$asunto = "comentario";
$mensaje= "envio de correo de tickets";
$desde = "lalal";

$envio = mail($destino, $asunto, $mensaje, $desde);
    
if(envio == false){
    echo "Error al enviar el correo. ";
    
    
}else {
    echo "Correo enviado con exito. ";
    
}


