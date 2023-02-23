<?php

require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelo.php";

//Clase Ajax
class AjaxFormularios {

    public $validarEmail;
    
    //Creacion de metodo para validar email existente
    public function ajaxValidarEmail() {

        $item = "email";
        $valor = $this->validarEmail;

        $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
        echo '<pre>'; print_r($respuesta); echo '<pre>';

    }

}

//Objeto de Ajax que recibe la variable POST
if(isset($_POST["validarEmail"])) {

    $valEmail = new AjaxFormularios();
    $valEmail -> validarEmail = $_POST["validarEmail"];
    $valEmail -> ajaxValidarEmail();

}