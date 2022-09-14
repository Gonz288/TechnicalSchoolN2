<?php
include_once("../../../db/claseMysql.php");
include("../../../model/crud_usuario.php");
session_start();
if($_SESSION['id_Cargo'] == 3){
	$objeto = new crud_usuario();

	if(isset($_POST['save'])){
		$Nombre		= $_POST['Nombre'];
		$Apellido   = $_POST['Apellido'];;
		$Usuario 	= $_POST['Usuario'];
		$Curso		= $_POST['id_Curso'];
		$Materia 	= $_POST['id_Materia'];
		$id_Cargo 	= $_POST['id_Cargo'];

		if($_POST['Contraseña1']==$_POST['Contraseña2']){
		$Contraseña=sha1($_POST['Contraseña2']);	}
		else{
		echo "<script>alert('Error, las contraseñas no son iguales'); window.location='CrearProfesor.php'; </script>";
		}

		$consultamostrar = $objeto->mostrar_condicion("*","usuarios","Usuario = '$Usuario'");
		if($consultamostrar == false){
			
			$consultaUsuario =  $objeto->insertar("usuarios(Usuario, Contraseña, id_Cargo)","'$Usuario','$Contraseña','$id_Cargo'");
		
			if($consultaUsuario == true){
				$consultamostrar2=$objeto->mostrar_condicion("*","usuarios","Usuario = '$Usuario'");
				foreach($consultamostrar2 as $row2);
				$id_Usuario = $row2['id_Usuario'];
			}
		}else{
			echo "<script>alert('Error, Nombre de usuario ya registrado'); window.location='CrearProfesor.php'; </script>";
		}

		$consultaProfesor = $objeto->insertar("profesores(Nombre, Apellido, id_Usuario)","'$Nombre','$Apellido','$id_Usuario'");

		$consultaprofesor2 = $objeto->mostrar_condicion("*","profesores","id_Usuario = $id_Usuario");
		foreach($consultaprofesor2 as $row3);
		$id_Profesor = $row3['id_Profesores'];

		$consultaMateria = $objeto->actualizar("materias","id_Profesores = '$id_Profesor'","id_Materia = '$Materia' AND id_Curso ='$Curso'");

		if($consultaProfesor == true && $consultaUsuario == true ){
			echo "<script>alert('Se ha Creado el Profesor Correctamente'); window.location='../../Perfil.php'; </script>";
		}else{
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo crear el profesor.</div>';
		}
	}
	?>

		<?php require("../../Partes/Head.php");?>

	<body>
	<?php require("../../Partes/Menu.php");?>

	<?php require("../../Partes/Login.php");?>
	<br><br><br>
	<div class="container-fluid mt-5 mb-5">
		<div class="row">
			<div class="col-xl-12">
				<h2 class="h2-responsive text-center ml-3 mb-4">Crear Nuevo Profesor</h2>
				<form class="form-horizontal ml-3" action="" method="post">
					<div class="form-group mb-4">
						<div class="col-xl-5 col-lg-7 col-md-8 m-auto">
							<label class="col-sm-5 control-label font-weight-bold">Nombre </label>
							<input type="text" pattern="[A-Za-z0-9_-]{1,15}"name="Nombre" value="" class="form-control" placeholder="Nombre" required>
						</div>
					</div>
					<div class="form-group mb-4">
						<div class="col-xl-5 col-lg-7 col-md-8 m-auto">
							<label class="col-sm-5 control-label font-weight-bold">Apellido </label>
								<input type="text"pattern="[A-Za-z0-9_-]{1,15}" name="Apellido" value="" class="form-control" placeholder="Apellido" required>
						</div>
					</div>
					<div class="form-group mb-4">
						<div class="col-xl-5 col-lg-7 col-md-8 m-auto">
							<label class="col-sm-5 control-label font-weight-bold">Usuario</label>
								<input type="text" pattern="[A-Za-z0-9_-]{1,15}"name="Usuario" value="" class="form-control" placeholder="Usuario: Se admiten letras, numeros y -_   Maximo 15 caracteres" required>
						</div>
					</div>

					<div class="form-group mb-4">
						<div class="col-xl-5 col-lg-7 col-md-8 m-auto">
							<label class="col-sm-5 control-label font-weight-bold">Nueva Contraseña</label>
							<input type="password" pattern="[A-Za-z0-9_-]{1,15}"name="Contraseña1" value="" class="form-control" placeholder="Contraseña: Se admiten letras, numeros y -_   Maximo 15 caracteres" required>
						</div>
					</div>
					<div class="form-group mb-4">
						<div class="col-xl-5 col-lg-7 col-md-8 m-auto">
							<label class="col-sm-5 control-label font-weight-bold">Repita la Contraseña</label>
							<input type="password"pattern="[A-Za-z0-9_-]{1,15}" name="Contraseña2" value="" class="form-control" placeholder="Contraseña: Se admiten letras, numeros y -_   Maximo 15 caracteres" required>
						</div>
					</div>
					<div class="form-group text-center">
						<div class="col-xl-6 col-lg-7 col-md-8 m-auto">
							<label class="col-sm-8 control-label font-weight-bold mb-4">Curso:
							<select id="selectCursosid" name="id_Curso" onchange="selectCursos()">
								<option value ="" class="font-weight-bold"> Seleccione un Curso</option>
								<?php
									if($resultado_curso = $objeto->mostrar("*","cursos"))

									foreach ($resultado_curso as $key =>$value){
									?> 
										<option value ="<?php echo $value["id_Curso"] ?>"> <?php echo $value['Año'] ?></option>
									<?php
									}
								?>
							</select>
							</label>
							<label class="col-sm-8 control-label font-weight-bold ">Materia:
							<select id="selectestado" name="id_Materia" disabled>
								<option value ="" class="font-weight-bold"> Seleccione una Materia</option>
							</select>
							</label>
						</div>
					</div>
					<div class="form-group">
							<input type="hidden" name="id_Cargo" value="2" class="form-control" placeholder="Cargo" readonly>
					</div>
					<div class="form-group">
					<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 text-center">
							<label class="col-sm-3 control-label font-weight-bold">&nbsp;</label>
							<input type="submit" name="save" class="btn btn-md btn-primary" value="Guardar datos">
							<a href="../../Perfil.php" class="btn btn-md btn-danger">Volver</a>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php require("../../Partes/Footer.php");?>

	<script type="text/javascript">
		//Ajax
		function selectCursos() {
			var id_Curso = $("#selectCursosid").val();
			$.ajax({
				url: "Select.php",
				method: "POST",
				data: {
					"id":id_Curso
				},
				success: function(respuesta){
					$("#selectestado").attr("disabled", false);
					$("#selectestado").html(respuesta);
				}
			})
		}

		function ConfirmPerfil(){
		var respuesta = confirm("Datos Guardados Correctamente");
		if(respuesta == true){
			return true;
		}else{
			return false;
		}
		}
		document.title = "Crear Profesor";
	</script>

	</body>
	</html>
<?php 
}else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
?>
