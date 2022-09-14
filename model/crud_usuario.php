<?php 
error_reporting(0);
include("../db/claseMysql.php");

function create_object(){
    $miconexion = new DataBaseMysql;
    return $miconexion;
}

class crud_usuario{
    public function insertar($tabla, $datos){
        $miconexion = create_object();
        $this->conexion = $miconexion->connect_bd("localhost", "root", "", "escuelatecnica2");

        $resultado = $this->conexion->query("INSERT INTO $tabla VALUES($datos)") or die ($this->conexion->error);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($tabla, $campos, $condicion){
        $miconexion = create_object();
        $this->conexion = $miconexion->connect_bd("localhost", "root", "", "escuelatecnica2");

        $resultado = $this->conexion->query("UPDATE $tabla SET $campos WHERE $condicion") or die ($this->conexion->error);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function eliminar($tabla, $condicion){
        $miconexion = create_object();
        $this->conexion = $miconexion->connect_bd("localhost", "root", "", "escuelatecnica2");

        $resultado = $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die ($this->conexion->error);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function mostrar($datos, $tabla){
        $miconexion = create_object();
        $this->conexion = $miconexion->connect_bd("localhost", "root", "", "escuelatecnica2");

        $resultado = $this->conexion->query("SELECT $datos FROM $tabla") or die ($this->conexion->error);
        if($resultado){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }

     public function mostrar_condicion($datos, $tabla, $condicion){
        $miconexion = create_object();
        $this->conexion = $miconexion->connect_bd("localhost", "root", "", "escuelatecnica2");

        $resultado = $this->conexion->query("SELECT $datos FROM $tabla WHERE $condicion") or die ($this->conexion->error);  
        if($resultado){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }

    public function buscador($datos, $tabla, $condicion){
        $miconexion = create_object();
        $this->conexion = $miconexion->connect_bd("localhost", "root", "", "escuelatecnica2");
    
        $resultado = $this->conexion->query("SELECT $datos FROM $tabla WHERE $condicion") or die ($this->conexion->error);
        if($resultado){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }
}
?>

