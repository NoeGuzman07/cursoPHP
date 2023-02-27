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
                <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Ingresar nombre" required id="actualizarNombre" name="actualizarNombre">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Ingresar correo electronico" required id="actualizarEmail" name="actualizarEmail">
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
				<input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">
            </div>
        </div>

		<?php

		$actualizar = ControladorFormularios::ctrActualizarRegistro();

        if ($actualizar == "OK") {
 
            $item = "id";
            $valor = $usuario["id"];
            $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
       
            echo '<script>
                    
                if ( window.history.replaceState ) {
                    
                    window.history.replaceState( null, null, window.location.href );
                
                }

            var datos = new FormData();

            datos.append("validarToken", "' . $usuario["token"] . '");
            
            $.ajax({
            
                url: "ajax/formularios.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                
                success:function(respuesta) {

                    $("#actualizarNombre").val(respuesta["nombre"]);	
                    $("#actualizarEmail").val(respuesta["email"]);
                    
                    $("#btnActualizar").hide();
                    $("#btnRegresar").removeClass("d-none").addClass("d-block");
              
                }

            })

            </script>';

            echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';
          
        }
        
        if ($actualizar == "error") {

            echo '<script>

                if ( window.history.replaceState ) {
                    
                    window.history.replaceState( null, null, window.location.href );
                
                }
            
                </script>';
            
            echo '<div class="alert alert-danger">Error al actualizar el usuario</div>';
          
            }
          
          ?>

          <button type="submit" id="btnActualizar" class="btn btn-primary">Actualizar</button>
          <a href="inicio" id="btnRegresar" class="btn btn-primary d-none">Regresar</a>

    </form>

</div>