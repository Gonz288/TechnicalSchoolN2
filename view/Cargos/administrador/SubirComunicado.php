<?php
include_once("../../../db/claseMysql.php");
include("../../../model/crud_usuario.php");
session_start();
if($_SESSION['id_Cargo'] == 3){

	require("../../Partes/Head.php");
?>
	<body>
		<?php
			require("../../Partes/Menu.php");
			$objeto = new crud_usuario(); 		
			if(isset($_POST['Guardar'])){
				$titulo        	= $_POST['Titulo'];
				$descripcion  	= $_POST['Descripcion'];
				$fecha   		= $_POST['Fecha'];
				
				$consulta = $objeto->insertar("comunicados(Titulo, Descripcion, Fecha)","'$titulo','$descripcion','$fecha'");
				if($consulta == true){
					echo "<script>alert('Se ha Subido el comunicado Correctamente'); window.location='../../PaginaPrincipal.php';</script>";
				}else{
					echo "<script>alert('Error, no se pudo subir el comunicado'); window.location='../../PaginaPrincipal.php';</script>";
				}
			}
		?>

		<br><br><br><br><br>					

		<div class="container-fluid mt-5 justify-content-xl-center">
			<h2 class="ml-3"> Publicar Comunicado </h4>
			<hr class="mb-5">
			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="form-row-cols-1">
					<div class="col-9">
						<h5 class="ml-1">Titulo </h5>
						<input type="text" name="Titulo" class="form-control mb-3" placeholder="Titulo" require>
					</div>		 
					<div class="col-9">
						<h5 class="ml-1">Descripcion </h5>
						<textarea name="Descripcion" class="form-control mb-3" id="exampleFormControlTextarea2" rows="5" placeholder="Descripcion" require></textarea>
					</div>
					<div class="col-7">
						<h5 class="ml-1">Fecha </h5>
						<input type="text" name="Fecha" class="form-control mb-3" placeholder="YYYY/MM/DD" require>
					</div>
				</div>
				<input type="submit" name="Guardar" class="btn btn-primary btn-md ml-3" value="Guardar">
				<a href="../../PaginaPrincipal.php"> <button type="button" class="btn btn-danger btn-md">Cancelar</button></a>
				<br>
			</form>	
		</div>
		<br><br><br><br>

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
			document.title = "Subir Comunicado";
		</script>
	</body>
	</html>
<?php }
else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
?>