<?php

class ControladorFormularios {

    //CREACION METODO PARA REGISTRAR USUARIOS EN LA TABLA "REGISTROS"
    static public function crtRegistro() {

        if (isset($_POST["registroNombre"])) {

            //nombre de la tabla que se encuentren dentro de la base de datos
            $tabla = "registros";
            
            //Arreglo con los datos de la tabla REGISTROS
            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"]
            );

            //Se instancia el modelo
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

            return $respuesta;

        }

    }

    ////CREACION METODO PARA CONSULTA DE DATOS DE LOS USUARIOS EN LA TABLA "REGISTROS"
    static public function ctrSeleccionarRegistros($item, $valor) {

        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;
    
    }

    ////CREACION METODO PARA MODIFICAR LOS DATOS DE LOS USUARIOS EN LA TABLA "REGISTROS"
    static public function ctrActualizarRegistro() {

        if (isset($_POST["actualizarNombre"])) {

            if($_POST["actualizarPassword"]!="") {

                $password = $_POST["actualizarPassword"];

            } else {

                $password = $_POST["passwordActual"];
            
            }

            //nombre de la tabla que se encuentren dentro de la base de datos
            $tabla = "registros";
            
            //Arreglo con los datos de la tabla REGISTROS
            $datos = array(
                "id" => $_POST["idUsuario"],
                "nombre" => $_POST["actualizarNombre"],
                "email" => $_POST["actualizarEmail"],
                "password" => $_POST["actualizarPassword"]
            );

            //Se instancia el modelo
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

            return $respuesta;

        }

    }


    //////CREACION METODO PARA ELIMINAR USUARIOS DE LA TABLA "REGISTROS"
    public function ctrEliminarRegistro() {

        if(isset($_POST["eliminarRegistro"])) {

            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

            if($respuesta == "OK") {

                echo '<script>                
                        if(window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                            window.location = "index.php?pagina=inicio";
                      </script>';

            }

        }

    }


    //CREACION METODO LOGIN (INICIO DE SESION AL SISTEMA) CON LOS USUARIOS DE LA TABLA "REGISTROS"
    public function crtIngreso() {

        if (isset($_POST["ingresoEmail"])) {
            
            //En tabla se pide todos los registros solicitados hasta el momento
            $tabla = "registros";

            //Item siginifica el elemento que deamos buscar coincidencia
            $item = "email";

            //en valor se envia el contenido que tenga la variable, en este caso el email enviado por parte del usuario
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if (is_array($respuesta)) {
                
                //Si el usuario ingreso correctamente al sistema se redirigira hacia la PAGINA DE INICIO DEL SISTEMA (LINEA 68)
                if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {

                    $_SESSION["validarIngreso"] = "OK";

                    echo '<script>                
                                if(window.history.replaceState) {
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?pagina=inicio";
                          </script>';
                
                } else {
                    
                    //Este script permite limpiar los datos que se envian a traves del Metodo POST
                    //NOTA: Este script se puede utilizar en diferentes proyectos
                    echo '<script>
                                if(window.history.replaceState) {
                                    window.history.replaceState(null, null, window.location.href);
                                }
                          </script>';

                    echo '<div class="alert alert-danger">Error al ingresar, el correo o la contrasena no coinciden</div>';
                }

            } else {
                
                echo '<script>
                            if(window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                          </script>';
                echo '<div class="alert alert-danger">Error al ingresar, el correo o la contrasena no coinciden</div>';
            
            }
        
        }
    
    }

}