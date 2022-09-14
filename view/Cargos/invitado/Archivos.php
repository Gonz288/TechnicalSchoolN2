<?php
	if(isset($_GET['Curso']));
	if(isset($_GET['Materia']));
	$Curso =  $_GET['Curso'];
	$Materia = $_GET['Materia'];
	$AllowInscripciones = True;

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
	<?php require("../../Partes/Menu.php"); ?>

	<div class="container-lg">
		<div class="row">
			<div class="col-xl-12">
				<section id="Sistema">
					<div class="row">
						<div class="col-12 text-md-left text-center">
							<h2 class="h2-responsive card-title"> Material para Mesas de Examenes</h2>
						</div>	
					</div>		
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 order-md-1 order-12 text-md-left text-center mt-sm-4 mt-0">
						<?php echo '<a href="Cursos.php">Cursos <i class="fas fa-angle-right">&nbsp;</i></a>'.'<a href="Materias.php?Curso='.$Curso.'">'.$Curso .' <i class="fas fa-angle-right">&nbsp;</i></a> '
								.'<a href="">'. $Materia .'</a>'; ?>

						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 order-md-12 order-1 text-md-right text-center ">
							<a href="#">
								<button name="submit" type="submit" class="btn btn-primary btn-md">
									<i class="fas fa-calendar-alt"> </i>  Fecha de mesas
								</button>
							</a>
							<?php if($AllowInscripciones){?>
								<a href="#">
									<button name="submit" type="submit" class="btn btn-danger btn-md">
										<i class="fas fa-pencil-alt"> </i> Inscripciones 
									</button>
								</a>	
							<?php }?>
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

	<?php require("../../Partes/Login.php"); ?>

	<?php require("../../Partes/Footer.php"); ?>

	<script>document.title = "Archivos";</script>

</body>
</html>