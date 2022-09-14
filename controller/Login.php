<?php 
session_start();
$estado = false;
if(isset($_SESSION['Usuario'])){
	$estado = true;
}
?>