<section id="form">
    <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h4 class="card-header elegant-color text-center py-4 arriba">
                    <strong>
                        <i class="fa fa-user prefix"></i> &nbsp;Iniciar Sesion
                    </strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="/PaginaEscuela/model/metadatos.php" method="post">

                    <!-- Email -->
                    <div class="md-form">
                        <input type="text" id="materialLoginFormEmail" required class="form-control" pattern="[A-Za-z0-9_-.@]{1,15}" name="User">
                        <label for="materialLoginFormEmail">Usuario</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" id="materialLoginFormPassword" required class="form-control" pattern="[A-Za-z0-9_-]{1,15}" name="Pass">
                        <label for="materialLoginFormPassword">Contraseña</label>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-success btn-block my-4 z-depth-1 font-weight-bold boton" type="submit" name="enviar" value ="Ingresar">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>