<?php require("../Partes/Head.php"); ?>

<body>
	<?php require("../Partes/Menu.php"); ?>


	<?php require("../Partes/Login.php"); ?>

	<div class="container-fluid justify-content-xl-center text-center Contactanos" >
		<h2 class="h2-responsive text-center mb-4">Mandanos un Email.</h2>
		<form action="../../controller/correo.php" method="POST">
			<div class="form-row-cols-1 mb-3">
				<div class="col-lg-6 col-md-7 col-sm-9 col-12 m-auto">
					<input type="text" class="form-control mb-3" placeholder="Nombre" name="nombre" required >
				</div>
				<div class="col-lg-6 col-md-7 col-sm-9 col-12 m-auto">
					<input type="text" class="form-control mb-3" placeholder="Su email"  name="email" required>
				</div>
				<div class="col-lg-6 col-md-7 col-sm-9 col-12 m-auto">
					<input type="text" class="form-control mb-3" placeholder="Asunto"  name="asunto" required>
				</div>	 
				<div class="col-lg-6 col-md-7 col-sm-9 col-12 m-auto">
					<textarea  class="form-control" rows="5 " placeholder="Mensaje" name="mensaje" required></textarea>
				</div>
			</div>

			<input type="submit" class="btn btn-primary btn-md ml-3" value="Enviar">
			<a href="../PaginaPrincipal.php"> <button type="button" class="btn btn-danger btn-md">Cancelar</button></a>
		</form>	
	</div>

	<?php require("../Partes/Footer.php"); ?>
	<script>document.title = "Contactanos";</script>
</body>
</html>