<?php
    include("crud_usuario.php");

    if (isset($_POST['User']) and isset($_POST['Pass']) ){
        $UserIngresado=strtolower($_POST['User']);
        $PassIngresado=sha1($_POST['Pass']);
    }else{ 
        $UserIngresado='';
        $PassIngresado='';
    }

    $objeto = new crud_usuario();
    $Respuesta = $objeto->mostrar_condicion("Usuario, Contraseña, id_Usuario, id_Cargo", 
        "usuarios", "Usuario='$UserIngresado' AND Contraseña='$PassIngresado' LIMIT 1 ");
   
    if($Respuesta == true){
        session_start();
        foreach ($Respuesta as $matriz);
        if($matriz){
        $UserBase=$matriz['Usuario'];
        $PassBase=$matriz['Contraseña'];
        $id_Usuario=$matriz['id_Usuario'];
        $Cargo=$matriz['id_Cargo'];
        
        $_SESSION['Usuario']=$UserBase;
        $_SESSION['Contraseña']=$PassBase;
        $_SESSION['id_Usuario']=$id_Usuario;
        $_SESSION['id_Cargo']=$Cargo;
        }
        header("Location:../view/PaginaPrincipal.php");
    }else{  
        ?>
            <SCRIPT language='JavaScript'>
                alert ("El nombre de usuario y contraseña es incorrecto"); 
                location.href='../view/PaginaPrincipal.php'; 
            </SCRIPT>
        <?php
    }

?> 