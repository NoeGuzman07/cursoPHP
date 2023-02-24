
<div class="text-center">
    <H1>Ingreso de usuarios</H1>
</div>

<br>
<div class="d-flex justify-content-center text-center">

    <!--Formulario -->
    <form method="POST" class="p-5 bg-light">

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Ingresar correo electronico" required name="ingresoEmail">
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Ingresar Contraseña" required name="ingresoPassword">
            </div>
        </div>

        <?php

        //Esta es la forma en la que se instancia o se define la clase de forma dinamica
        $ingreso = new ControladorFormularios();
        $ingreso->crtIngreso();

        ?>

        <center><button type="submit" class="btn btn-primary">Iniciar sesión</button></center>

    </form>

</div>