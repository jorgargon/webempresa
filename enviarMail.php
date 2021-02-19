<?php
 
if($_POST) {
    $nombre = "";
    $empresa = "";
    $telefono = "";
    $email = "";
    $asunto = "Contacto WEB - ";
    $mensaje = "";
    $fecha = date("D d/m/Y (H:i:s)", time());
     
// Desinfección de datos de entrada

    if(isset($_POST[nombreContacto])) {
        $nombre = filter_var($_POST[nombreContacto], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST[empresaContacto])) {
        $empresa = filter_var($_POST[empresaContacto], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST[telefonoContacto])) {
        $telefono = filter_var($_POST[telefonoContacto], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST[mailContacto])) {
        $email = $_POST[mailContacto];
        // $email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST[asuntoMensaje])) {
        $asunto .= filter_var($_POST[asuntoMensaje], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST[mensajeContacto])) {
        $mensaje = htmlspecialchars($_POST[mensajeContacto]);
    }
     
// Preparación del mensaje
    $recipient = "jorgargon@outlook.com";
        
    $textoMensaje = "Usuario ".$nombre."\r\n Empresa: " .$empresa. "\r\n Telefono: " .$telefono. 
    "\r\n Mail: ".$email. "\r\n Fecha: ".$fecha. "\r\n Mensaje: \r\n".$mensaje." \r\n";

    $textoMensaje = wordwrap($textoMensaje, 70, "\r\n");
        
    // mail($recipient, $asunto, $textoMensaje);
    
    if(mail($recipient, $asunto, $textoMensaje)) {
        header("Location: http://obias.es/mensajeok.html");
    } else {
        header("Location: http://obias.es/mensajenook.html");
    }
     
} else {
    header("Location: http://obias.es/mensajenook.html");
}
 
?>
