<?php

require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelo.php";

//Clase Ajax
class AjaxFormularios {

    //Variable publicas
    public $validarEmail;
    
    //Creacion de funcion para validar email existente
    public function ajaxValidarEmail() {

        $item = "email";
        $valor = $this->validarEmail;

        $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
        //Impresion en consola
        echo '<pre>'; print_r($respuesta); echo '<pre>';

    }

}

//Objeto de Ajax que recibe la variable POST
if(isset($_POST["validarEmail"])){

	$valEmail = new AjaxFormularios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();

}