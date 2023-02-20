<div class="text-center">
    <H1>Registro de usuarios</H1>
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
                <input type="text" class="form-control" placeholder="Ingresar nombre" required id="nombre" name="registroNombre">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Ingresar correo electronico" required id="email" name="registroEmail">
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Ingresar Contraseña" required id="pwd" name="registroPassword">
            </div>
        </div>

        <?php

        //Esta es la forma en la que se instancia o se define la clase de forma estatica
        $registro = ControladorFormularios::crtRegistro();

        if ($registro == "OK") {

            //Este script permite limpiar los datos que se envian a traves del Metodo POST
            //NOTA: Este script se puede utilizar en diferentes proyectos
            echo '<script>
                
                        if(window.history.replaceState) {
                        
                            window.history.replaceState(null, null, window.location.href);

                        }
                
                    </script>';

            echo '<div class="alert alert-success">El usuario ha sido registrado en el sistema</div>';
        }

        ?>

        <center><button type="submit" class="btn btn-primary">Registrar usuario</button></center>

    </form>

</div>