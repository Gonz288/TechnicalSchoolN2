<?php
	include("../model/crud_usuario.php");
	require("Partes/Head.php");
	session_start();
	$usuarioverificacion= $_SESSION['id_Usuario'];
	$Cargo = $_SESSION['id_Cargo'];
	$objeto = new crud_usuario();

	//Usuarios
	$sql = $objeto->mostrar_condicion("t1.Usuario, t1.Contraseña ,t2.Descripcion_Cargo","usuarios t1 INNER JOIN cargo t2 ON t1.id_Cargo=t2.id_Cargo","id_Usuario = '$usuarioverificacion'");
	foreach ($sql as $row){
		$Contraseña            = $row['Contraseña'];
		$Usuario               = $row['Usuario'];
		$Descripcion_Cargo	   = $row['Descripcion_Cargo'];
	}

	//Profesores
	$sqlProfesores = $objeto->mostrar_condicion("*","profesores", "id_Usuario = '$usuarioverificacion'");
	foreach ($sqlProfesores as $row){
		$NombreProfesor            	   = $row['Nombre'];
		$ApellidoProfesor              = $row['Apellido'];
		$id_Profesor 				   = $row['id_Profesores'];
	}
	$sqlMaterias = $objeto->mostrar_condicion("*","materias INNER JOIN cursos ON cursos.id_Curso=materias.id_Curso", "id_Profesores = '$id_Profesor'");

	//Administradores
	$sqlAdministrador = $objeto->mostrar_condicion("*","administradores", "id_Usuario = '$usuarioverificacion'");
	foreach ($sqlAdministrador as $row){	
		$NombreAdmin           = $row['Nombre'];
		$ApellidoAdmin         = $row['Apellido'];
	}

	$allowProfesores = false;
	$allowAdministradores = false;

	if($Cargo == 2){
		$allowProfesores = true;
	}else if($Cargo == 3){
		$allowAdministradores = true;
	}

	//Modificar Datos del Usuario
	if(isset($_POST['save'])){
		$NombreAdmin  		= $_POST['Nombre'];
		$ApellidoAdmin      = $_POST['Apellido'];;

		$NombreProfesor		= $_POST['Nombre'];
		$ApellidoProfesor   = $_POST['Apellido'];;

		$Usuario  		= $_POST['Usuario'];

		if($_POST['Contraseña1']==$_POST['Contraseña2']){
		$Contraseña=sha1($_POST['Contraseña2']);	}
		else{
		echo "<script>alert('Error al guardar datos, revise que estos coinsidan'); window.location='../view/Perfil.php'; </script>";
		}

		if($Cargo == 2){
			$sql_update = $objeto->actualizar("profesores INNER JOIN usuarios ON profesores.id_Usuario = usuarios.id_Usuario", "Nombre='$NombreProfesor', Apellido='$ApellidoProfesor', usuarios.Usuario='$Usuario', usuarios.Contraseña='$Contraseña'", "profesores.id_Usuario = '$usuarioverificacion'");
		}else if($Cargo == 3){
			$sql_update = $objeto->actualizar("administradores INNER JOIN usuarios ON administradores.id_Usuario = usuarios.id_Usuario", "Nombre='$NombreAdmin', Apellido='$ApellidoAdmin', usuarios.Usuario='$Usuario', usuarios.Contraseña='$Contraseña'", "administradores.id_Usuario = '$usuarioverificacion'");
		}

		if($sql_update == true){
			echo "<script>alert('Se han guardado los datos Correctamente'); window.location='../view/PaginaPrincipal.php'; </script>";
		}else{
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
		}
	}

	//Borrar Profesor
	if(isset($_GET['aksi']) == 'delete'){
		$nik = $_GET["nik"];
		$cek = $objeto->mostrar_condicion("*","profesores","id_Profesores='$nik'"); 
		if($cek == 0){
			echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, No se ha encontrado al profesor.</div>';
			header("location:Perfil.php");
		}else{
			$borrar = $objeto->eliminar("profesores","id_Usuario='$nik'");
			$borrar2 = $objeto->eliminar("usuarios","id_Usuario='$nik'");

			if($borrar && $borrar2){
				echo "<script>alert('Se ha eliminado el profesor Correctamente'); </script>";
			}else{
				echo "<script>alert('Error, No se pudo eliminar el profesor'); </script>";
			}
		}
	}

?>

<body>

	<?php require("Partes/Menu.php");?>

	<?php require("Partes/Login.php");?>

	<div class="container-fluid Perfil">
		<div class="row">
			<div class="col-lg-4 col-sm-12 Datos">
				<h2 class="ml-3 text-xl-left text-center mb-4">Perfil &raquo; Datos del Usuario</h2>
				<form class="" action="" method="post">
					<div class="form-group">
						<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
						<label class="control-label font-weight-bold">Nombre </label>
						<input type="text" class="form-control"name="Nombre" value="<?php if($allowProfesores){echo $NombreProfesor; }else if($allowAdministradores){echo $NombreAdmin; }?>" pattern="[A-Za-z0-9]{1,15}" class="form-control" placeholder="Nombre" required>
						</div>
					</div>
					<div class="form-group">
					<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
					<label class="control-label font-weight-bold">Apellido </label>
						<input type="text"  name="Apellido" value="<?php if($allowProfesores){echo $ApellidoProfesor; }else if($allowAdministradores){echo $ApellidoAdmin; }?>" pattern="[A-Za-z0-9]{1,15}" class="form-control" placeholder="Apellido" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
						<label class="control-label font-weight-bold">Usuario </label>

							<input type="text" name="Usuario" value="<?php echo $Usuario; ?>" class="form-control" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Usuario: Se admiten letras, numeros y -_   Maximo 15 caracteres" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
						<label class="control-label font-weight-bold">Nueva Contraseña </label>
							<input type="password"  name="Contraseña1" value="" class="form-control"  pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña: Se admiten letras, numeros y -_   Maximo 15 caracteres" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
						<label class="control-label font-weight-bold">Repita la Contraseña </label>
							<input type="password" name="Contraseña2" value="" class="form-control"  pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña: Se admiten letras, numeros y -_   Maximo 15 caracteres" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
						<label class="control-label font-weight-bold">Cargo </label>
						<p>
							<?php echo $Descripcion_Cargo;  ?>
						</p>
						</div>
					</div>
					<?php if($allowProfesores){?>
					<div class="form-group">
						<div class="col-xl-10 col-lg-11 col-md-7 col-sm-8 m-xl-0 m-sm-auto">
						<label class="control-label font-weight-bold">Materia/s  Asignada/s </label>
						</p>
						<?php	
						foreach ($sqlMaterias as $row){
							echo $row['Año']." ".$row['Descripcion_Materia'].'</p>';
						}
						?> 
						</div>
					</div>
					<?php } ?>
					<div class="form-group">
						<div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 text-center">
							<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
							<a href="PaginaPrincipal.php" class="btn btn-sm btn-danger">Volver</a>
						</div>
					</div>
				</form>
			</div>

			<?php if($allowAdministradores){?>
			<div class="col-xl-7 col-lg-8 col-md-12">
				<div class="col-12 text-center text-xl-left">
					<a href ="/PaginaEscuela/view/Cargos/administrador/CrearProfesor.php" class="white-text">
						<button type="button" class="btn btn-info btn-md">
							<i class="fas fa-user-plus"></i> Crear Nuevo Profesor
						</button>
					</a>
					<a href ="/PaginaEscuela/view/Cargos/administrador/EliminarProfesor.php" class="white-text">
						<button type="button" class="btn btn-danger btn-md">
							<i class="fas fa-trash"></i> Eliminar Profesores
						</button>
					</a>
					</div>
					<div class ="table-responsive-sm">
						<table border="1" id="dtBasicExample" class="table text-center table-striped">
							<thead class="table-dark">
								<tr> 
									<th> Curso 	  </th>
									<th> Materia  </th>
									<th> Profesor </th>
									<th> Editar </th>
								</tr>
							</thead>                
							<tbody>
								<?php
									$resultado = $objeto->mostrar("*","materias t1 LEFT JOIN profesores t2 ON t1.id_Profesores=t2.id_Profesores INNER JOIN cursos t3 ON t1.id_Curso=t3.id_Curso");	
									foreach ($resultado as $fila){
									echo "<tr>";
									echo "<td>".$fila['Año']."</td>"; 
									echo "<td>".$fila["Descripcion_Materia"]."</td>";
									echo "<td>".$fila['Nombre']." ".$fila['Apellido']."</td>";
									echo '<td>
									<a href="/PaginaEscuela/view/Cargos/administrador/EditarMateria.php?nik='.$fila["id_Materia"].'" title="Editar datos" class="btn btn-primary btn-sm mb-1"><i class="fas fa-edit"></i></span></a>
									</td>';
									}
									echo "</tr>";
								?>
							</tbody>    
						</table>
					</div>		
				</div>
			<?php }?>
			</div>
		</div>
	</div>

	<?php require("Partes/Footer.php");?>

	<script type="text/javascript">
		function ConfirmPerfil(){
			var respuesta = confirm("Datos Guardados Correctamente");
			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
		document.title = "Perfil";
	</script>

</body>
</html>