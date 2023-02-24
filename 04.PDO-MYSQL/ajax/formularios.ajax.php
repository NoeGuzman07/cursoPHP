<?php

require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelo.php";

//Clase Ajax
class AjaxFormularios {

    //Variable publica
    public $validarEmail;
    
    //Creacion de funcion para validar email existente
    public function ajaxValidarEmail() {

        $item = "email";
        $valor = $this->validarEmail;

        $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
        //Impresion en consola
        //echo '<pre>'; print_r($respuesta); echo '<pre>';
        echo json_encode($respuesta);

    }

	public $validarToken;

	public function ajaxValidarToken(){

		$item = "token";
		$valor = $this->validarToken;

		$respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
		//echo json_encode($respuesta);
        //echo '<pre>'; print_r($respuesta); echo '<pre>';
        var_dump($respuesta);
	}

}

//Objeto de Ajax que recibe la variable POST de email
if(isset($_POST["validarEmail"])){

	$valEmail = new AjaxFormularios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();

}

//Objeto de Ajax que recibe la variable POST de token
if(isset($_POST["validarToken"])){

	$valToken = new AjaxFormularios();
	$valToken -> validarToken = $_POST["validarToken"];
	$valToken -> ajaxValidarToken();

}