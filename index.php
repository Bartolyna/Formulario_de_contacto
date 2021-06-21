<?php


$errores='';
$enviado='';

if(isset($_POST['submit'])){
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $mensaje=$_POST['mensaje'];

    if (!empty($nombre)) {
        $nombre=trim($nombre);
        $nombre=htmlspecialchars($nombre);
        $nombre=stripslashes($nombre);
        $nombre=filter_var($nombre, FILTER_SANITIZE_STRING);
    }else{
        $errores .='Por favor agrega un nombre. <br>';
    }

    if(!empty($correo)){
        $correo= filter_var($correo, FILTER_SANITIZE_EMAIL);

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .= 'Por favor ingresa un correo valido. <br>';
        }
    }else{
        $errores .= 'Por favor agrega un correo . <br>';        
    }

    if (!empty($mensaje)) {
        $mensaje= trim($mensaje);
        $mensaje= htmlspecialchars($mensaje);
        $mensaje= stripslashes($mensaje);
        $mensaje= filter_var($mensaje,FILTER_SANITIZE_STRING);
    }else{
        $errores .='Por favor ingresa un mensaje';
    }

    if(!$errores){
        $enviar_a = 'carlosandres19982009@hotmail.com';
        $asunto = 'Correo enviado desde mi formulario';
        $mensaje_pre = "De: $nombre \n";
        $mensaje_pre .= "Correo: $correo \n";
        $mensaje_pre .= "Mensajes $mensaje";
//La funcion sirve para el envio de correos        
//      mail($enviar_a, $asunto, $mensaje_pre);
        $enviado= true;
    }
}

include_once('index.view.php');

?>