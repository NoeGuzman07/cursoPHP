<?php

if (!isset($_SESSION["validarIngreso"])) {

    echo '<script>window.location = "index.php?pagina=ingreso";</script>';

    return;
} else {

    if ($_SESSION["validarIngreso"] != "OK") {

        echo '<script>window.location = "index.php?pagina=ingreso";</script>';

        return;
    }
}

//Consulta de datos
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);

?>

<div class="text-center">
    <H1>Usuarios registrados en el sistema:</H1>
</div><br>

<!-- Tabla con usuarios registrados en el sistema -->
<table class="table table-striped">

    <thead>

        <tr align="center">
            <th>#</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>

        <!-- Creamos un ciclo for each utilizando sintaxis de PHP para mostrar los usuarios registrados en el sistema hasta el momento-->
        <?php foreach ($usuarios as $key => $value) : ?>
            <tr align="center">

                <td><?php echo ($key + 1); ?></td>

                <td><?php echo $value["nombre"]; ?></td>

                <td><?php echo $value["email"]; ?></td>

                <td><?php echo $value["fecha"]; ?></td>

                <td>

                    <div class="btn-group">

                        <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning">Editar <i class="fa-solid fa-pencil"></i></a> &nbsp; &nbsp;

                        <form method="POST">

                            <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">

                            <button type="submit" class="btn btn-danger"> Eliminar <i class="fa-solid fa-trash"></i></button>

                            <?php
                            
                                $eliminar = new ControladorFormularios();
                                $eliminar -> ctrEliminarRegistro();
                            
                            ?>

                        </form>

                    </div>

                </td>

            </tr>

        <?php endforeach ?>

    </tbody>

</table>