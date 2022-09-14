﻿<?php
session_start();
if(isset($_GET['Curso']))
$Curso =  $_GET['Curso'];
if($_SESSION['id_Cargo'] == 3){

	require("../../Partes/Head.php");
?>


<body style="background-color:#e9ecef;">
	<?php require("../../Partes/Menu.php"); ?>


<div class="container-lg">
	<div class="row">
		<div class="col-xl-12">
			<section id="Sistema">
					<div class="row">
						<div class="col-xl-8 col-lg-7 col-md-6 col-sm-12 col-12 text-sm-left text-center">
							<h2 class="h2-responsive card-title"> Material para Mesas de Examenes</h2>
						</div>
						<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 text-sm-right text-center ">
							<a href="#">
							<button name="submit" type="submit" class="btn btn-primary btn-md">
								<i class="fas fa-calendar-alt"> </i>  Fecha de mesas
							</button>
							</a>
							<a href="#">
							<button name="submit" type="submit" class="btn btn-danger btn-md">
								<i class="fas fa-pencil-alt"> </i> Inscripciones 
							</button>
							</a>	
						</div>		
					</div>		
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12 order-sm-1 order-12 text-sm-left text-center mt-sm-4 mt-0 ">
							<?php echo '<a href="Cursos.php">Cursos  <i class="fas fa-angle-right">&nbsp;</i></a>'.'<a href="">'.$Curso .'</a>'; ?>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 order-sm-12 order-1 text-sm-right text-center mt-3 mb-sm-0 mb-2">
							<form action="../../../controller/Administrador/CrearDirectorio.php" method="post">
								<input type="text" name="Nombre" value="">
								<?php echo '<input type="hidden" name="Ano" value="'.$Curso.'">' ?>
								<input type="submit" name="btn" value="Crear Carpeta">
							</form>
						</div>
					</div>
				<hr class="mt-0 mb-0"> </hr>
				<div class="table">
					<table border="1" id="dtBasicExample" class="table text-center table-striped">
						<thead class="table-dark">
							<tr> 
								<th> Materias </th> 
							</tr>
						</thead>                
						<tbody>
							<?php
								$dir = opendir("../../Archivos/Cursos/$Curso/Materias");
								while( $Materia = readdir($dir)){
								if($Materia != '.' && $Materia != '..' && $Materia != '.htaccess'){
									echo '<tr> <td><i class="fas fa-folder">&nbsp;</i>'. '<a href="Archivos.php?Curso='.$Curso.'&'.'Materia='.$Materia.'">'.$Materia.'</a> </td>';
									echo "</tr>";
								}
								}
							?>
						</tbody>    
					</table>
				</div>
			</section>
		</div>
	</div>
</div>


<?php require("../../Partes/Footer.php"); ?>

<script>document.title = "Materias";</script>

</body>
</html>
<?php 
}else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
?>