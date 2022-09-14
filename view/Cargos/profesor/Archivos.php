<?php
	session_start();
	if($_SESSION['id_Cargo'] == 2){
		
	include_once("../../../db/claseMysql.php");
	include("../../../model/crud_usuario.php");


	if(isset($_GET['Curso']));
	if(isset($_GET['Materia']));
	$id_Usuario = $_SESSION['id_Usuario'];
	$Curso =  $_GET['Curso'];
	$Materia = $_GET['Materia'];

	$objeto = new crud_usuario(); 			
	$consulta = $objeto->mostrar_condicion("*", "profesores","id_Usuario = '$id_Usuario'");
	foreach($consulta as $matriz2){	$Profesor = $matriz2['id_Profesores']; }

	$SQL = $objeto->mostrar_condicion("*", "materias t1 INNER JOIN cursos t2 ON t1.id_Curso=t2.id_Curso", "t1.Descripcion_Materia = '$Materia' and t2.Año = '$Curso' and t1.id_Profesores = '$Profesor'");	

	if($SQL == true){
		$allow_eliminar = true;
		$allow_agregar = true;
	}else{
		$allow_eliminar = false;
		$allow_agregar = false;
	}

	function formatSizeUnits($bytes){
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

	require("../../Partes/Head.php");
?>

<body style="background-color:#e9ecef;">
	<?php require("../../Partes/Menu.php");?>

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
							<?php if($allow_agregar){ ?>
								<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#centralModalSm">
									<i class="fas fa-file-upload"></i>  Subir Archivo
								</button>
							<?php } ?>
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
										<?php if($allow_eliminar){?>
										<th> Eliminar </th>
										<?php } ?>
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
											echo "<td>" .'<a href="../../Archivos/Cursos/'.$Curso.'/'.'Materias/'.$Materia.'/'.$archivo.'" download="'.$archivo.'""><i class="fas fa-file-download"></i> </a>';
												
											if($allow_eliminar){
											echo "<td>". 
												'<a href="../../../controller/EliminarArchivo.php?Archivo=../view/Archivos/Cursos/'.
												$Curso.'/'.'Materias/'.$Materia.'/'.$archivo.'&'.'Ano='.$Curso.'&'.'Materia='.$Materia.'">
													<button type="button" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()">Eliminar 
													</button>'."</a> </td>";
											}
											echo "</tr>";
											}
										}
									?>
								</tbody>    
							</table>
						</div>
					<?php if($allow_agregar){ ?>
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
										<form action="../../../controller/Upload.php" method= "POST" enctype = "multipart/form-data">
											<?php echo '<input type="hidden" name="Ano" value="'.$Curso.'">' ?>
											<?php echo '<input type="hidden" name="Materia" value="'.$Materia.'">' ?>
											<input type="file" name="archivo" id="archivo">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary " value="Enviar">Subir</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
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
