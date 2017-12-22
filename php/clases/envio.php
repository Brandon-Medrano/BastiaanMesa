<?php

//$correo = REQUEST('correo');
$fecha= date("d-m-Y");
$destino = "vanl97@hotmail.com";
$asunto = "comentario";
$mensaje= "envio de correo de tickets";
$desde = "ing.brandon.medrano@gmail.com";
mail($destino, $asunto, $mensaje, $desde);
    
if(envio == false){
    echo "Error al enviar el correo. ";
    
    
}else {
    echo "Correo enviado con exito. ";
    
}


