<?php
	require("Partes/Head.php");
?>
<body>
	<?php require("Partes/Menu.php");?>

	<section id="team-header">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8">
				<div class="card-body">
					<h4 class="card-title"> Ciclo Basico</h4>
					<p class="mt-4">
						Los contenidos de enseñanza del Ciclo Básico están organizados en módulos que utilizarán preponderantemente la estrategia 
						didáctica de taller, ya que aquí se prioriza el hacer y el reflexionar sobre lo que se hace (la responsabilidad del hombre 
						y de su accionar frente a la sociedad y al mundo natural)
					</p>
					<p>
						El taller es una modalidad de organización didáctica en donde se requiere de la participación activa de los estudiantes en torno 
						a un proyecto concreto de trabajo que implica la contextualización en la realidad, la puesta en juego de conocimientos y procesos
						de pensamiento, y la interacción entre pares y con el docente, lo que favorece el establecimiento de acuerdos, el respeto por normas
						de convivencia, y el esfuerzo colectivo para el logro de un objetivo común.
					</p>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 segundadacol">	
				<div class="card-body">
					<h4 class="card-title"> Talleres</h4>
					<p >
						Carga Horaria semanal: 2 horas por taller
					</p>
					<p>
						<i class="fas fa-angle-right"></i> Procedimientos Tecnicos
					</p>
					<p>
						<i class="fas fa-angle-right"></i> Sistemas Tecnologicos
					</p>
					<p>
						<i class="fas fa-angle-right"></i> Lenguaje Tecnologico
					</p>
					<p class="mt-4 mb-1">
						<a href="Archivos/DiseñosCurriculares/CicloBasico.pdf" class="pdf2" target="_blank"><i class="far fa-file-pdf" ></i> Diseño Curricular "Ciclo Basico"</a>
					</p>
				</div>
			</div>	
		</div>	
	</section>

	<section id="team">
		<div class="row m-auto">
			<div class="col-xl-4 col-md-6 col-sm-12 mb-4">
				<div class="card h-100">
					<div class="contenedor-img">
						<img src="Archivos/img/carpinteria.jpg" alt="" class="img-fluid">
					</div>
					<div class="card-body">
						<h3 class="card-title pt-4"> PROCEDIMIENTOS TECNICOS</h3>
						<p class="card-text">Los estudiantes adquiriran conocimiento y habilidades de distintas tecnicas a traves 
							de la construccion de un producto tecnologico. Se abordara el uso adecuado de las herramientas y maquinas bajo 
							las normas de seguridad e higiene. Los estudiantes conoceran los criterios para la seleccion de las herramientas 
							y maquinas mas adecuadas para las diferentes actividades</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 col-sm-12 mb-4">
				<div class="card h-100">
					<div class="contenedor-img">
						<img src="Archivos/img/electricidad.jpg" alt="" class="img-fluid">
					</div>
					<div class="card-body">
						<h3 class="card-title pt-4"> SISTEMAS TECNOLOGICOS</h3>
						<p class="card-text">Se realizaran actividades que permitan a los estudiantes la utilizacion y operacion de mecanismos 
							con componentes concretos y simples, mediante la construccion, el diseño y el analisis de las partes que conforman 
							el funcionamiento de un sistema. Se analizara la vinculacion de cada sistema con las transformaciones sociales y 
							productivas que han generado su invencion y evolucion</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-4 col-sm-12 tercercard">
				<div class="card h-100">
					<div class="contenedor-img">
						<img src="Archivos/img/dibujotecnico.jpg" alt="" class="img-fluid">
					</div>
						<div class="card-body">
						<h3 class="card-title pt-4"> LENGUAJE TECNOLOGICO</h3>
						<p class="card-text">Se abordaran actividades asociadas al tratamiento de la informacion tecnologica con la intencion 
							de que los estudiantes sean capaces de comunicar ideas e informacion tecnica, familiarizandolos en el uso de computadora
							como herramientas de trabajo. Elaborar representaciones utilizadas en el ambito tecnologico, a traves de diagramas, 
							graficos y dibujos tecnicos, tanto en forma manual como digital</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require("Partes/Login.php");?>

	<?php require("Partes/Footer.php");?>
	<script>
		document.title = "Ciclo Basico";
	</script>
</body>
</html>