<?php
	include_once("../../../db/claseMysql.php");
	include("../../../model/crud_usuario.php");
	session_start();
if($_SESSION['id_Cargo'] == 3){
	$objeto = new crud_usuario();

	//Borrar Profesor
	if(isset($_GET['aksi']) == 'delete'){
		$nik = $_GET["nik"];
		$cek = $objeto->mostrar_condicion("*","profesores","id_Usuario='$nik'"); 
		if($cek == 0){
			echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, No se ha encontrado al profesor.</div>';
		}else{
			foreach($cek as $row){
				$id_Profesor = $row['id_Profesores'];
			}
			$actualizar = $objeto->actualizar("materias","id_Profesores = NULL","id_Profesores = '$id_Profesor'");

			$borrar = $objeto->eliminar("profesores","id_Usuario='$nik'");
			$borrar2 = $objeto->eliminar("usuarios","id_Usuario='$nik'");

			if($borrar && $borrar2 && $actualizar){
				echo "<script>alert('Se ha eliminado el profesor Correctamente'); </script>";
			}else{
				echo "<script>alert('Error, No se pudo eliminar el profesor'); </script>";
			}
		}
	}
	require("../../Partes/Head.php");
?>

<body>
	<?php require("../../Partes/Menu.php");?>
	<?php require("../../Partes/Login.php");?>

<div class="container Eliminar_Profe">
	<h2 class="h2-responsive">Eliminar Profesor</h2>
	<hr>
	<p class="note note-danger"><strong>Nota:</strong> Al eliminar un Profesor, se le borrara por completo la cuenta, 
	por lo que tambien se le eliminaran todos los permisos de sus materias correspondientes.</p>	
	<div class ="table-responsive-sm">
		<table border="1" id="dtBasicExample" class="table text-center table-striped">
			<thead class="table-dark">
				<tr> 
					<th> Nombre </th>
					<th> Apellido </th>
					<th> Accion </th>
				</tr>
			</thead>                
			<tbody>
				<?php
					$resultado = $objeto->mostrar("*","profesores");	
					foreach ($resultado as $fila){
					echo "<tr>";
					echo "<td>".$fila['Nombre']."</td>";
					echo "<td>".$fila['Apellido']."</td>";
					echo '<td>
					<a href="EliminarProfesor.php?aksi=delete&nik='.$fila["id_Usuario"].'" class="btn btn-danger btn-sm mb-1" onclick="return confirm(\'¿Esta seguro que desea borrar el Profesor?\')"><i class="fas fa-trash"></i> Eliminar</span></a>
					</td>';
					}
					echo "</tr>";
				?>
			</tbody>    
		</table>
	</div>
</div>

<?php require("../../Partes/Footer.php");?>


<script type="text/javascript">
	function ConfirmPerfil(){
		var respuesta = confirm("Datos Guardados Correctamente");
		if(respuesta == true){
			return true;
		}else{
			return false;
		}
	}
	document.title = "Eliminar Profesor";
</script>
</body>
</html>
<?php 
}else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
?>