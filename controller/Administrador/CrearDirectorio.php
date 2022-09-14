<?php
//Crear Nueva Carpeta Materia
if(isset($_POST['Nombre']) && isset($_POST['Ano'])){
$Materias = "Materias";
$Ano = $_POST['Ano'];
$rutacasicompleta = "../../view/Archivos/Cursos/$Ano/$Materias";
$Nombre = $_POST['Nombre'];
$rutacompleta = "../../view/Archivos/Cursos/$Ano/Materias/$Nombre";
//Crear Carpeta Materias, Cuando se crea un nuevo curso
if(!file_exists($rutacasicompleta)){
    mkdir($rutacasicompleta);
}
if(isset($rutacompleta)){
    if(!file_exists($rutacompleta)){
        mkdir($rutacompleta);
        $mensaje = "Se ha creado la carpeta: $rutacompleta;";
    }else{
        $mensaje = "La carpeta:".$rutacompleta."ya existe";
    }
}
header("location:../../view/Cargos/administrador/Materias.php?Curso=".$Ano."");
//Crear Nueva Carpeta Curso
}else if(isset($_POST['Nombre'])){
$Nombre = $_POST['Nombre'];
$rutacompleta = "../../view/Archivos/Cursos/$Nombre";
if(isset($rutacompleta)){
    if(!file_exists($rutacompleta)){
        mkdir($rutacompleta);
        $mensaje = "Se ha creado la carpeta: $rutacompleta;";
    }else{
        $mensaje = "La carpeta:".$rutacompleta."ya existe";
    }
}
header("location:../../view/Cargos/administrador/Cursos.php");
}
?>
