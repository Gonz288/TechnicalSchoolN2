<?php
$archivo_temp = $_FILES["archivo"] ["tmp_name"];
$archivo = $_FILES["archivo"] ["name"];
$archivo_tamaño = $_FILES["archivo"]["size"];
$ext = pathinfo($archivo, PATHINFO_EXTENSION);
$Año = $_POST['Ano'];
$Materia = $_POST['Materia'];
$ruta = "../view/Archivos/Cursos/$Año/Materias/$Materia/$archivo";
if(move_uploaded_file($archivo_temp, $ruta)){
    echo "Archivo Subido";
}else{
    echo "No subido";
}
header("location:../view/Cargos/profesor/Archivos.php?Curso=".$Año."&"."Materia=".$Materia."");
?>
