<?php
session_start();
if($_SESSION['id_Cargo'] == 3){

	if(isset($_GET['Curso']));
	if(isset($_GET['Materia']));
	$Curso =  $_GET['Curso'];
	$Materia = $_GET['Materia'];

	require("../../Partes/Head.php");
	?>

	<body style="background-color:#e9ecef;">
	
	<?php require("../../Partes/Menu.php"); ?>

	<!-- Subir Archivo Formulario -->
	<?php
		function formatSizeUnits($bytes)
		{
			if ($bytes >= 1073741824)
			{
				$bytes = number_format($bytes / 1073741824, 2) . ' GB';
			}
			elseif ($bytes >= 1048576)
			{
				$bytes = number_format($bytes / 1048576, 2) . ' MB';
			}
			elseif ($bytes >= 1024)
			{
				$bytes = number_format($bytes / 1024, 2) . ' KB';
			}
			elseif ($bytes > 1)
			{
				$bytes = $bytes . ' bytes';
			}
			elseif ($bytes == 1)
			{
				$bytes = $bytes . ' byte';
			}
			else
			{
				$bytes = '0 bytes';
			}

			return $bytes;
		}
	?>

	<div class="container-lg">
		<div class="row">
			<div class="col-xl-12">
				<section id="Sistema">
						<div class="row">
							<div class="col-12 text-sm-left text-center">
								<h2 class="h2-responsive card-title"> Material para Mesas de Examenes</h2>
							</div>	
						</div>		
						<div class="row">
							<div class="col-xl-6 col-lg-8 col-md-6 col-sm-8 col-12 order-sm-1 order-12 text-sm-left text-center mt-sm-5 mt-0 ">
							<?php echo '<a href="Cursos.php">Cursos <i class="fas fa-angle-right">&nbsp;</i></a>'.'<a href="Materias.php?Curso='.$Curso.'">'.$Curso .' <i class="fas fa-angle-right">&nbsp;</i></a> '
									.'<a href="">'. $Materia .'</a>'; ?>
							</div>
							<div class="col-xl-6 col-lg-4 col-md-6 col-sm-4 col-12 order-sm-12 order-1 text-sm-right text-center mt-3 mb-sm-0 mb-2">
								<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#centralModalSm">
									<i class="fas fa-file-upload"></i>  Subir Archivo
								</button>
							</div>
						</div>
					
						<hr class="mt-0 mb-0"> </hr>
						<div class="table-responsive-sm">
							<table border="1" id="dtBasicExample" class="table text-center table-striped">
								<thead class="table-dark">
									<tr> 
										<th> Nombre </th> 
										<th> Peso </th> 
										<th> Descargar </th> 
										<th> Eliminar </th>
									</tr>
								</thead>                
								<tbody>
									<?php
										$dir = opendir("../../Archivos/Cursos/$Curso/Materias/$Materia");
										while( $archivo = readdir($dir)){
											if(!is_dir($archivo)){
											echo "<tr>";
											echo "<td>".'<a href="../../Archivos/Cursos/'.$Curso.'/'.'Materias/'.$Materia.'/'.$archivo.'" target="_blank">'.$archivo. '</a></td>';
											echo "<td>". formatSizeUnits(filesize("../../Archivos/Cursos/$Curso/Materias/$Materia/$archivo")) ."</td>";
											echo "<td>".'<a href="../../Archivos/Cursos/'.$Curso.'/'.'Materias/'.$Materia.'/'.$archivo.'" download="'.$archivo.'""><i class="fas fa-file-download"></i> </a>';
											echo "<td>".'<a href="../../../controller/Administrador/EliminarArchivo.php?Archivo=../../view/Archivos/Cursos/'.$Curso.'/'.'Materias/'.$Materia.'/'.$archivo.'&'.'Ano='.$Curso.'&'.'Materia='.$Materia.'"><button type="button" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()"> Eliminar </button>'."</a> </td>";
											echo "</tr>";
											}
										}
									?>
								</tbody>    
							</table>
						</div>

					<!-- Cartel Subir Archivo -->
					<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title w-100" id="myModalLabel">Seleccionar Archivo</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="../../../controller/Administrador/Upload.php" method= "POST" enctype = "multipart/form-data">
									<?php echo '<input type="hidden" name="Ano" value="'.$Curso.'">' ?>
									<?php echo '<input type="hidden" name="Materia" value="'.$Materia.'">' ?>
									<input type="file" name="archivo" id="archivo">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light btn-md " data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-primary btn-md " value="Enviar">Subir</button>
								</form>
							</div>
							</div>
						</div>
					</div>
					
				</section>
			</div>	
		</div>
	</div>


	<?php require("../../Partes/Footer.php");?>


	<script type="text/javascript">
		function ConfirmDelete(){
			var respuesta = confirm("¿Estas seguro que deseas eliminar el archivo?");
			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
	</script>
	<script>document.title = "Archivos";</script>

	</body>
	</html>
<?php 
}else{
	header("location:/PaginaEscuela/view/PaginaPrincipal.php");
}
?>
