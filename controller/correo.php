<?php 
$destino="gonza_gonzalez28@hotmail.com";
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$contenido= "Nombre: " . $nombre . "\nCorreo: ". $email . "\n Mensaje: " . $mensaje;
mail($destino,$asunto,$contenido);
echo "<script>alert('Se Envio el mail correctamente'); window.location='../view/PaginaPrincipal.php';</script>";
?>