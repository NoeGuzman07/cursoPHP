<?php

    if(isset($_GET["token"])) {

        $item = "token";
        $valor = $_GET["token"];

        $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);

    }

?>

<div class="text-center">
    <H1>Editar datos de usuarios</H1>
</div>

<br>
<div class="d-flex justify-content-center text-center">

    <!--Formulario -->
    <form method="POST" class="p-5 bg-light">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Ingresar nombre" required id="nombre" name="actualizarNombre">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Ingresar correo electronico" required id="email" name="actualizarEmail">
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Ingresar Contraseña" id="pwd" required name="actualizarPassword">
                
                <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
				<input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]; ?>">
            
            </div>
        </div>

		<?php

		$actualizar = ControladorFormularios::ctrActualizarRegistro();

		if($actualizar == "OK") {

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido actualizado</div>

			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=inicio";

				},2000);

			</script>

			';

		}

        if($actualizar == "error") {

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-danger">Error al actualizar el usuario</div>

			';

		}

		?>
		

        <center><button type="submit" class="btn btn-primary">Actualizar</button></center>

    </form>

</div>