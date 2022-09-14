<?php 
session_start();
if($_SESSION['id_Cargo'] == 0 or $_SESSION['id_Cargo'] == 1 ){
    header("location:../view/Cargos/invitado/Cursos.php");
}
else if($_SESSION['id_Cargo'] == 2){
    header("location:../view/Cargos/profesor/Cursos.php");
}
else if($_SESSION['id_Cargo'] == 3){
    header("location:../view/Cargos/administrador/Cursos.php");
}
?>