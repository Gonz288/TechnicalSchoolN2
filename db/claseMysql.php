<?php
error_reporting(0);
class DataBaseMysql{
    var $BaseDatos;
    var $Servidor;
    var $Usuario;
    var $Clave;

    var $Conexion_ID = 0;

    var $Error = "";

    public function __construct($host = "localhost", $user = "root", $pass = "", $bd = "escuelatecnica2") {
        $this->Servidor = $host;
        $this->Usuario = $user;
        $this->Clave = $pass;
        $this->BaseDatos = $bd;
    }

    function connect_bd($host, $user, $pass, $bd){
        if ($host != ""){$this->Servidor = $host;}
        if ($user != ""){$this->Usuario = $user;}
        if ($pass != ""){$this->Clave = $pass;}
        if ($bd != ""){$this->BaseDatos = $bd;}
        
        $this->Conexion_ID = mysqli_connect($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
        
        if ($this->Conexion_ID) {
            return $this->Conexion_ID;
        }else{
            $this->Error = "Ha fallado la conexión.";
            return $this->Error;
        }
    }
}

?>

