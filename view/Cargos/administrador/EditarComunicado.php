<?php
include_once("../../../db/claseMysql.php");
include("../../../model/crud_usuario.php");
$id=$_GET["id"];
session_start();
if($_SESSION['id_Cargo'] == 3){
	require("../../Partes/Head.php");
?>

<body>

 	<?php
	require("../../Partes/Menu.php");

	$objeto = new crud_usuario(); 			
	if(isset($_POST['Guardar'])){
		$id 			= $_POST['id'];
		$titulo			= $_POST['titulo'];
		$descripcion 	= $_POST['descripcion'];
		$fecha 			= $_POST['fecha'];
		
		$consulta = $objeto->actualizar("comunicados", "Titulo='$titulo', Descripcion='$descripcion', Fecha='$fecha'", "id_Comunicado='$id'");
		if($consulta == true){
			echo "<script>alert('Se han actualizado los cambios correctamente'); window.location='../../PaginaPrincipal.php';</script>";
		}else{
		echo"<script>alert('Error, no se pudo actualizar los datos');window.history.go(-1);</script";
		}
	}

	$consulta = $objeto->mostrar_condicion("*", "comunicados", "id_Comunicado = '$id'");
	
	foreach($consulta as $row){
	?>

	<br><br><br><br><br>					

	<div class="container-fluid mt-5 justify-content-xl-center">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
				<input type="hidden" class="form-control" value="<?php echo $row['id_Comunicado'];?>" name="id">
			</div>
			<div class="form-row-cols-1">
				<div class="col-9">
					<h5 class="ml-1">Titulo </h5>
					<input type="text" class="form-control mb-3 " value="<?php echo $row['Titulo']; ?>" placeholder="Titulo" name="titulo">
				</div>		 
				<div class="col-9">
					<h5 class="ml-1">Descripcion </h5>
					<textarea name="descripcion" class="form-control mb-3" id="exampleFormControlTextarea2" rows="5" placeholder="Descripcion"><?php echo $row['Descripcion']; ?></textarea>
				</div>
				<div class="col-7">
					<h5 class="ml-1">Fecha </h5>
					<input type="text" class="form-control mb-3" value="<?php echo $row['Fecha']; ?>" placeholder="Fecha" name="fecha">
				</div>
			</div>
			<?php }?>
			<input type="submit" name="Guardar" class="btn btn-primary btn-md ml-3" value="Guardar">
			<a href="../../PaginaPrincipal.php"> <button type="button" class="btn btn-danger btn-md">Cancelar</button></a>
			<br>
		</form>	
		<hr>
	</div>
	
	<br><br>

	<?php require("../../Partes/Login.php");?>
		
	<?php require("../../Partes/Footer.php");?>

	<script>
		const boton = document.getElementById('boton');
		const navbar = document.getElementById('navbar');

		boton.addEventListener('click', function () {
		if (navbar.classList.contains('colornegro')){
			navbar.classList.remove('colornegro');
		}else{
			navbar.classList.add('colornegro');
		}
		});
		document.title = "Editar Comunicado";
	</script>

	</body>
	</html>
<?php }
else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
 ?>