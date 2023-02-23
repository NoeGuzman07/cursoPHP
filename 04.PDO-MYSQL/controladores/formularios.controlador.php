<?php

class ControladorFormularios {

    //CREACION METODO PARA REGISTRAR USUARIOS EN LA TABLA "REGISTROS"
    static public function crtRegistro() {

        if (isset($_POST["registroNombre"])) {

            //condicion de PHP que nos ayuda a evitar colocar codigos de JavaScript que puedan alterar el sistema
            //En esta condicion validamos que los datos de los usuarios puede aceptar estos caracteres para subirlos a la base de datos
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
			   preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])) {

            //nombre de la tabla que se encuentren dentro de la base de datos
            $tabla = "registros";

            //Uso de TOKENS para encriptar la informacion
            $token = md5($_POST["registroNombre"]."+".$_POST["registroEmail"]);
            
            //Arreglo con los datos de la tabla REGISTROS
            $datos = array("token" => $token,
                           "nombre" => $_POST["registroNombre"],
                           "email" => $_POST["registroEmail"],
                           "password" => $_POST["registroPassword"]
            );

            //Se instancia el modelo
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

            return $respuesta;

            } else {

                $respuesta = "error";

                return $respuesta;

            }

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

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["actualizarNombre"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"])) {

                $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["tokenUsuario"]);
            
                $compararToken = md5($usuario["nombre"]."+".$usuario["email"]);

            if($compararToken == $_POST["tokenUsuario"] && $_POST["idUsuario"] == $usuario["id"]) {
            
                if($_POST["actualizarPassword"]!="") {

                $password = $_POST["actualizarPassword"];

            } else {

                $password = $_POST["passwordActual"];
            
            }

            //nombre de la tabla que se encuentren dentro de la base de datos
            $tabla = "registros";

            $actualizarToken = md5($_POST["actualizarNombre"]."+".$_POST["actualizarEmail"]);
            
            //Arreglo con los datos de la tabla REGISTROS
            $datos = array( "id" => $_POST["idUsuario"],
									"token" => $actualizarToken,
									"nombre" => $_POST["actualizarNombre"],
						           "email" => $_POST["actualizarEmail"],
						           "password" => $password);

            //Se instancia el modelo
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

            return $respuesta;

        } else {

            $respuesta = "error";

            return $respuesta;

        }

    } else {

        $respuesta = "error";

        return $respuesta;

    }

}

}

    


    //////CREACION METODO PARA ELIMINAR USUARIOS DE LA TABLA "REGISTROS"
	public function ctrEliminarRegistro(){

		if(isset($_POST["eliminarRegistro"])){

			$usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token",  $_POST["eliminarRegistro"]);

			$compararToken = md5($usuario["nombre"]."+".$usuario["email"]);

			if($compararToken == $_POST["eliminarRegistro"]){

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

                    $actualizarIntentosFallidos = ModeloFormularios::mdlActualizarIntentosFallidos($tabla, 0, $respuesta["token"]);

                    $_SESSION["validarIngreso"] = "OK";

                    echo '<script>                
                                if(window.history.replaceState) {
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?pagina=inicio";
                          </script>';
                
                } else {

                    if($respuesta["intentos_fallidos"] < 3) {

                    $tabla = "registros";

                    $intentos_fallidos = $respuesta["intentos_fallidos"]+1;
                    //echo '<pre>'; print_r($intentos_fallidos); echo '</pre>';
                    $actualizarIntentosFallidos = ModeloFormularios::mdlActualizarIntentosFallidos($tabla, $intentos_fallidos, $respuesta["token"]);

                    } else {

                        echo '<div class="alert alert-warning">RECAPTCHA Debes validar que no eres un robot</div>';

                    }
                    
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