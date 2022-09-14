<?php
	include_once("../../../db/claseMysql.php");
	include("../../../model/crud_usuario.php");
	session_start();
if($_SESSION['id_Cargo'] == 3){
	$objeto = new crud_usuario();

	$nik = $_GET["nik"];
	//Borrar Profesor
	if(isset($_GET['aksi']) == 'delete'){
		
			$borrar = $objeto->actualizar("materias","id_Profesores = NULL","id_Materia = '$nik'");

			if($borrar){
				echo "<script>window.location='EditarMateria.php?nik='$nik';</script>";
			}else{
				echo "<script>alert('Error, No se pudo dar de baja al profesor');</script>";
			}
	}

	//Asignar Profesor
	if(isset($_POST['save'])){
		$id_Profesor = $_POST['profesor'];

		$actualizar = $objeto->actualizar("materias","id_Profesores = '$id_Profesor'","id_Materia = '$nik'");    
		if($actualizar){
			echo "<script>alert('Se ha asignado al Profesor Correctamente'); </script>";
		}else{
			echo "<script>alert('Error, No se pudo asignar al Profesor');</script>";

		}	
	}
	require("../../Partes/Head.php");
?>

<body>
	<?php require("../../Partes/Menu.php"); ?>

	<?php require("../../Partes/Login.php"); ?>

	<div class="container-fluid Editar_Materia">
		<h2 class="ml-3">Editar Materia</h2>
		<hr>
		<?php 
			$resultado = $objeto->mostrar_condicion("*","materias INNER JOIN cursos ON materias.id_Curso=cursos.id_Curso LEFT JOIN profesores ON materias.id_Profesores=profesores.id_Profesores","materias.id_Materia = '$nik'");
			foreach ($resultado as $fila);
				echo "<p class='font-weight-bold ml-3'>Curso: <span class='font-weight-normal'>".$fila['Año']."</span></p>";
				echo "<p class='font-weight-bold ml-3'>Materia: <span class='font-weight-normal'>".$fila['Descripcion_Materia']."</span></p>";
				if($fila["id_Profesores"] != NULL){
				echo "<p class='font-weight-bold ml-3'>Profesor: <span class='font-weight-normal'>".$fila['Nombre']." ".$fila['Apellido']."</span></p>";
				echo "<p class='font-weight-bold ml-3'>".'Dar de Baja al Profesor: <a href="EditarMateria.php?aksi=delete&nik='.$fila["id_Profesores"].'" title="Eliminar" onclick="return confirm(\'¿Esta seguro que desea borrar el Profesor?\')" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</span></a>';
				}
			if($fila["id_Profesores"] == NULL){
		?>
			<form class="form-horizontal" action="" method="post">
				<p class="font-weight-bold ml-3">Asignar Profesor:
				<select id="selectpaisesid" name="profesor" onchange="selectpaises()">
					<option value ="" class="font-weight-bold">Listado de Profesores</option>
					<?php
						if($resultado_profesor = $objeto->mostrar("*","profesores"))

						foreach ($resultado_profesor as $key =>$value){
						?> 
							<option value ="<?php echo $value["id_Profesores"] ?>"> <?php echo $value['Nombre']." ".$value['Apellido'] ?>
							</option>
						<?php
						}
					?>
				</select>
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="Asignar">
			</form>
		<?php } ?>		
	</div>

	<?php require("../../Partes/Footer.php"); ?>

	<script type="text/javascript">
		function ConfirmPerfil(){
			var respuesta = confirm("Datos Guardados Correctamente");
			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
		document.title = "Editar Materia";
	</script>
</body>
</html>
<?php 
}else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
?>
