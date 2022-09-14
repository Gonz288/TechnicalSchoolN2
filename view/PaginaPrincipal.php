<?php
	include("../model/crud_usuario.php");
?>
<!DOCTYPE html>
<html long ="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pagina Principal</title>
	<!-- Icons -->
	<script src="https://kit.fontawesome.com/c5d3e97c41.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/stylepagprincipal2.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link href="css/mdboostrap/bootstrap.min.css" rel="stylesheet">
	<!-- Carrusel -->	
	<link rel="stylesheet" href="../view/css/estiloscarousel2.css">
	<!-- Material Design Bootstrap -->
	<link href="css/mdboostrap/mdb.min.css" rel="stylesheet">
	<!-- JQuery -->
	<script type="text/javascript" src="css/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="css/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="css/js/mdb.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-xl navbar-dark scrolling-navbar fixed-top animated fadeInDown" id="navbar">
		<a class="navbar-brand" href="PaginaPrincipal.php"> 
			<img src="Archivos/img/Logo.png" class="logo-brand"> E.E.S.T N°2 
		</a>
		<button class="navbar-toggler" id="boton" data-target="#menu" data-toggle="collapse" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav ml-auto mr-4">
				<li class="nav-item mr-4">
					<a class="nav-link active" href="PaginaPrincipal.php">
						<span class="button"><i class="fas fa-home"></i>Inicio</span>
					</a>
				</li>
				<li class="nav-item mr-4">
					<a class="nav-link " href="Ciclo Basico.php">
						<span class="button">Ciclo Basico</span> 
					</a>
				</li>
				<li class="nav-item dropdown mr-4">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="button">Ciclo Superior </span></a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="Informatica.php">Informatica</a>
						<a class="dropdown-item" href="MMO.php">Maestro Mayor de Obra</a>
					</div>
				</li>
				<li class="nav-item dropdown mr-4">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
					<span class="button">Septimo Año </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item active" href="Septimo Informatica.php">Septimo Informatica </a>
						<a class="dropdown-item" href="Septimo M. Mayor de Obras.php">Septimo M.M.O </a>
					</div>
				</li>
				<li class="nav-item dropdown mr-4">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
						<span class="button">Otros </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="otros/NormasdeConvivencia.php">N. de Convivencia </a>
						<a class="dropdown-item" href="otros/Centroestudiantes.php">Instituciónal</a>
						<a class="dropdown-item" href="../controller/Preguntar.php">Mesa de Examenes</a>
						<a class="dropdown-item" href="otros/Contactanos.php">Mandanos un Email</a>
					</div>
				</li>
				<?php
					require_once("../controller/Login.php");
					if($estado){
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-user"></i> Perfil </a>
							<div class="dropdown-menu dropdown-menu-left dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
								<a class="dropdown-item" href="Perfil.php"><i class="fas fa-user-edit"></i> Mi Perfil</a>
								<a class="dropdown-item" href="../controller/CerrarSesion.php"><i class="fas fa-power-off"></i> Cerrar Sesion</a>
							</div>
						</li>
					<?php }else{
						echo '<button type="button" class="btn btn-outline-success waves-effect login" data-toggle="modal" data-target="#centralModalSm">
							<i class="fa fa-user prefix"></i>&nbsp; Ingresar
						</button>';
					}
				?>
			</ul>
		</div>
	</nav>

	<!------------------------------------------ Slide ------------------------------------------>
	<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block img-fluid " src="Archivos/img/Slider/imagen.png" alt="First slide">
				<div class="carousel-caption text-center">
					<h1 class="animated fadeInDown "> <span class="barras2 animated fadeInLeft">
						</span>Técnica Número 2 <span class="barras animated fadeInRight"></span>
					</h1>
					<h2 class="animated fadeInUp ">'Dr. Rene Favaloro'</h2>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid" src="Archivos/img/Slider/imagen2.png" alt="Second slide" >
				<div class="carousel-caption text-center">
					<h1 class="animated"> <span class="barras2"></span>Técnica Número 2 <span class="barras"></span> 
					</h1>
					<h2 class="animated">'Dr. Rene Favaloro'</h2>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid" src="Archivos/img/Slider/imagen.png" alt="Third slide">
				<div class="carousel-caption text-center">
					<h1> <span class="barras2"></span>Técnica Número 2 <span class="barras"></span> </h1>
					<h2>'Dr. Rene Favaloro'</h2>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<br>

	<!------------------------------------------   Cartas de Talleres    ------------------------------------------>
	<section id="team">
		<div class="row m-auto">
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card text-center h-100">
					<div class="card-body">
						<i class="fa fa-desktop"></i>
						<h3 class="card-title pt-2">Objetivos </h3>
						<p class="card-text">
							Los Objetivos que se intentan lograr en términos educativos es que los alumnos puedan tener un perfil profesional, 
							tanto en conocimientos en el area como la conducta de los mismos.
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card text-center h-100">
					<div class="card-body">
						<i class="fa fa-pencil"></i>
						<h3 class="card-title pt-2">Dirección</h3>
						<p class="card-text">
							La institución educativa Escuela Técnica Nº 2 se encuentra ubicada en la localidad de Villa de Mayo perteneciente al Municipio de Malvinas Argentinas
							de la Provincia de Buenos Aires. En la dirección de: Rawson 2950 entre Ing. Huergo y Cochabamba
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 tercercard">
				<div class="card text-center h-100">
					<div class="card-body">
						<i class="fa fa-book"></i>
						<h3 class="card-title pt-2">Contactos</h3>
						<p class="card-text">
							Para solicitar bacantes puede consultar al siguiente numero: 4463-8347 / 4463-9894 o a la dirección del siguiente E-Mail: eestnro2malvarg@gmail.com<br>
							<a href="otros/Contactanos.php" class="link_materias"> Mandanos un E-Mail</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br>

	<!---------------------------- Inscripciones ---------------------------->
	<div class="botones">
		<a href="#">
			<button type="button" class="btn btn-primary btn-lg btn-block  bg-primary ">
				<h3 class="h3-responsive">- PRE INSCRIPCIONES 2021  -</h3>
			</button>
		</a>
		<br><br>
		<a href="#"><button type="button" class="btn btn-success btn-lg btn-block bg-success ">
			<h3 class="h3-responsive">- REINSCRIPCIONES 2021  -</h3></button>
		</a>
		<br>
	</div>

	<!---------------------------- Redes, Mapa, Comunicados, Carrusel, etc... ---------------------------->
	<section id="cosas">
		<div class="row">
			<!---------------------------- Redes ---------------------------->
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-7 redes text-center">
				<hr>
				<h2 class="h2-responsive text-center">Nuestras Redes:</h2>
				<hr>
				<a href="https://www.youtube.com/channel/UCOY7uWhOfxXQDdVG8stwJgg" style="text-decoration:none">
					<button type="button" class="btn btn-danger btn-yt btn-lg"><i class="fab fa-youtube">&nbsp;&nbsp;Youtube</i> 
					</button>
				</a>
				<hr>
				<a href="https://www.facebook.com/tecnica2.malvinas" style="text-decoration:none">
					<button type="button" class="btn btn-indigo btn-fb btn-lg"><i class="fab fa-facebook-f">&nbsp;&nbsp;Facebook</i>
					</button>
				</a>
				<hr>
				<a href="https://www.instagram.com/tecnica2.malvinas/" style="text-decoration:none">
					<button type="button" class="btn btn-ins btn-lg insta"><i class="fab fa-instagram">&nbsp;&nbsp;Instagram</i> 
					</button>
				</a>
			</div>

			<!---------------------------- Mapa ---------------------------->
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center">
				<div class="Map">
					<hr>
					<h2 class="h2-responsive text-center">Ubicación:</h2>
					<hr>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3287.5504775323493!2d-58.67551312049855!3d-34.5
					1427885354475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcbcc67fcd8f65%3A0x205bb2d26227c528!2zRXNjdWVsYSBUw6ljbmljY
					SBOwroyICJEci4gUmVuw6kgRmF2YWxvcm8i!5e0!3m2!1ses!2sar!4v1570032707700!5m2!1ses!2sar" frameborder="0" style="border:0;" allowfullscreen="" class="mapa"></iframe>
				</div>
			</div>
		</div>

		<!---------------------------- Material Mesas ---------------------------->					
		<div class="row mt-5 ">
			<div class="col-xl-12">
				<h2 class="h2-responsive card-title text-sm-left text-center">Material para Mesa de Examenes:</h2>
				<hr>
				Desde el siguiente boton podra acceder a la visualizacion y Descarga de los documentos que contienen los temarios de cada materia que le podran servir
				en las mesas de examenes:<br><br><br>
				<div class="button_material">
					<a href="../controller/Preguntar.php"><button type="button" class="btn btn-success btn-lg"><i class="fa-solid fa-file-lines mr-2"></i>Acceder al Material</button></a>
				</div>
			</div>
		</div>
		<hr>

		<!---------------------------- Comunicados ---------------------------->
		<div id="comunicados">
			<?php
				if($_SESSION['id_Cargo'] == 3){
				echo '<a href="Cargos/administrador/SubirComunicado.php"><button type="button" class="btn btn-primary btn-lg " data-toggle="modal" data-target="#centralModalSm">
				Subir Comunicado </button></a>';
				}
				$objeto = new crud_usuario();
				//Paginador
				$sql_registe = $objeto->mostrar("COUNT(*) as total_registro","comunicados");
				foreach ($sql_registe as $result_register);
				$total_registro = $result_register['total_registro'];
				$por_pagina = 3;
				if(empty($_GET['pagina'])){
					$pagina = 1;
				}else{
					$pagina = $_GET['pagina'];
				}
				$desde = ($pagina-1) * $por_pagina;
				$total_paginas = ceil($total_registro / $por_pagina);

				//Borrar Comunicados
				if(isset($_GET['aksi']) == 'delete'){
					$nik = $_GET["nik"];
					$borrar = $objeto->eliminar("comunicados","id_Comunicado='$nik'");
					if($borrar){
						echo "<script>alert('Se ha Eliminado el Comunicado Correctamente'); window.location='PaginaPrincipal.php';</script>";
					}else{
						echo "<script>alert('Error, No se pudo eliminar el Comunicado'); window.location='PaginaPrincipal.php';</script>";
					}
				}
				$consulta = $objeto->mostrar("*","comunicados order by Fecha DESC LIMIT $desde,$por_pagina");
				foreach ($consulta as $row){
			?>
				<div class="row mt-4">
					<div class="col-xl-12 mb-2">
						<h2 class="card-tittle text-center"></h2>
						<div class="card">
							<div class="card-body">
								<?php if($_SESSION['id_Cargo'] == 3){?>
								<p class="card-text text-right"><a href="Cargos/administrador/EditarComunicado.php?id=<?php echo $row["id_Comunicado"];?>">Editar</a></p>
								<?php }		?>
								<h5 class="card-title"><?php echo $row["Titulo"] ?></h5>
								<p class="card-text"><?php echo  $row["Descripcion"]?></p>
								<footer class="blockquote-footer"><?php echo $row["Fecha"] ?></footer>
								<?php if($_SESSION['id_Cargo'] == 3){?>
								<?php echo '<p class="card-text text-right"><a href="PaginaPrincipal.php?aksi=delete&nik='.$row["id_Comunicado"].
								'" title="Eliminar" onclick="return confirm(\'¿Esta seguro que desea borrar el comunicado?\')"
								class="btn btn-danger btn-sm mb-1">Eliminar</span></a>';
								}?>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<!-- Paginador-->                             
			<ul class="pagination justify-content-center mt-4 pg-teal">
				<li class="page-item active mr-2"><a class="page-link" href=""><?php echo "Pagina " .$pagina. " de " . $total_paginas; ?></a></li>
				<?php
					if($pagina != 1){
					?>
					<li class="page-item"><a class="page-link" href="?pagina=<?php echo 1; ?>#comunicados"><i class="fas fa-angle-double-left"></i></a></li>
					<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina-1; ?>#comunicados"><i class="fas fa-angle-left"></i></a></li>
					<?php } ?>
				<?php
					for($i=1; $i <= $total_paginas; $i++){
						if($i == $pagina){
							echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
						}else{
						echo '<li class="page-item"><a class="page-link" href="?pagina='.$i.'#comunicados">'.$i.'</a></li>';
						}        
					}
				?>
				<?php
					if($pagina != $total_paginas){
					?>
						<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>#comunicados"><i class="fas fa-angle-right"></i></a></li>
						<li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?>#comunicados"><i class="fas fa-angle-double-right"></i></a></li>
					<?php } ?>
			</ul>
		</div>
		<hr> 

		<!---------------------------- Carrusel Directivos ---------------------------->
		<h2 class="h2-responsive text-sm-left text-center">Equipo Directivo:</h2>
		<hr>
		<section id="team">
			<div class="directivos">
				<div class="contenedor-directivo-controles">
					<div class="indicadores"></div>
				</div>
				<div class="contenedor-principal">
					<button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
					<div class="contenedor-carousel">
						<div class="carousel">
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Directora</h4>
											<p class="p-responsive card-text">Andrea Rodríguez Pérez</p>
										</div>
									</div>
								</div>
							</div>
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Vicedirector</h4>
											<p class="p-responsive card-text">Alejandro Baldonado</p>
										</div>
									</div>
								</div>
							</div>
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Vicedirector</h4>
											<p class="p-responsive card-text">Ángel Castillo</p>
										</div>
									</div>
								</div>
							</div>
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Secretaria</h4>
											<p class="card-text">Mónica Mamani</p>
										</div>
									</div>
								</div>
							</div>
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Prosecretaria</h4>
											<p class="card-text">Liliana Baridon</p>
										</div>
									</div>
								</div>
							</div>
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Jefa de Area</h4>
											<p class="card-text">Mariela Bagnato</p>
										</div>
									</div>
								</div>
							</div>
							<div class="directivo">
								<div class="col-15 col-md-15">
									<div class="card mb-0">
										<img class="card-img-top imagen" src="Archivos/img/usuario.png" alt="Card image cap">
										<div class="card-body">
											<h4 class="h4-responsive font-weight-bold">Jefa de Preceptores</h4>
											<p class="card-text">Alicia Espadavora</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fas fa-angle-right"></i></button>
				</div>
			</div>
		</section>

		<!---------------------------- Comentarios ---------------------------->
		<hr>
		<div class="row">
			<div class="col-xl-12 text-center">
				<h2 class="h2-responsive">Comentarios</h2>
				<hr>
			</div>
		</div>

	</section>

	<?php require("Partes/Login.php"); ?> <!--Login-->

	<?php require("Partes/Footer.php"); ?> <!--Footer-->
	
	<script type="text/javascript" src="css/js/main2.js"></script>
	
</body>
</html>