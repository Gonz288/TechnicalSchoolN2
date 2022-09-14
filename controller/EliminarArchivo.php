<?php
$Archivo = $_GET['Archivo'];
$Año     = $_GET['Ano'];
$Materia = $_GET['Materia'];
unlink($Archivo);
header("location:../view/Cargos/profesor/Archivos.php?Curso=".$Año."&"."Materia=".$Materia."");
?>