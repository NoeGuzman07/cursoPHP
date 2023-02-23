<!-- Instruccion de PHP que nos permite utilizar variables de sesion -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo MVC</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled Font Awesome (6)-->
    <script src="https://kit.fontawesome.com/032c4d9b9e.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Logotipo -->
    <div class="container-fluid">
        <H3 class="text-center py-3">Sistema de gestión de usuarios</H3>
    </div>

    <!-- Botonera (opciones)-->
    <div class="container-fluid bg-light">

        <div class="container">

            <ul class="nav nav-justified py-2 nav-pills">

                <?php if (isset($_GET["pagina"])) : ?>

                    <?php if ($_GET["pagina"] == "registro") : ?>

                        <li class="nav-item">
                            <a class="nav-link active" href="registro">Registro</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="registro">Registro</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "ingreso") : ?>

                        <li class="nav-item">
                            <a class="nav-link active" href="ingreso">Ingreso</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="ingreso">Ingreso</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "inicio") : ?>

                        <li class="nav-item">
                            <a class="nav-link active" href="inicio">Inicio</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="inicio">Inicio</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "salir") : ?>

                        <li class="nav-item">
                            <a class="nav-link active" href="salir">Salir</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="salir">Salir</a> <!-- Registrar informacion en una base de datos -->
                        </li>

                    <?php endif ?>

                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="registro">Registro</a> <!-- Registrar informacion en una base de datos -->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="ingreso">Ingreso</a> <!-- Realizar un Login al sistema -->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="inicio">Inicio</a> <!-- Pagina de inicio al sistema donde se muestra la lista de personas registradas en el sistema-->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="salir">Salir</a> <!-- Salir y cerrar sesion del sistema -->
                    </li>

                <?php endif ?>

            </ul>

        </div>

    </div>

    <div class="container-fluid">

        <div class="container py-5">

            <?php

            //ISSET(): Es una funcion que determina si una variable esta definida y no es NULL
            //Estas rutas equivale a una lista blanca de direcciones
            if (isset($_GET["pagina"])) {

                if (
                    $_GET["pagina"] == "registro" ||
                    $_GET["pagina"] == "ingreso" ||
                    $_GET["pagina"] == "inicio" ||
                    $_GET["pagina"] == "editar" ||
                    $_GET["pagina"] == "salir"
                ) {

                    include "paginas/" . $_GET["pagina"] . ".php";
                } else {

                    include "paginas/error404.php";
                }
            } else {

                //Pagina de inicio al sistema
                include "paginas/registro.php";
            }

            ?>

        </div>

    </div>

</body>

</html>