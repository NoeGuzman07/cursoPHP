<?php

require_once "conexion.php";

class ModeloFormularios {

    //METODO REGISTRO PARA LA TABLA "REGISTROS"
    static public function mdlRegistro($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, nombre, email, password) VALUES(:token, :nombre, :email, :password)");

        //NOTA: Esta es la forma en la que tenemos que escribir la sintaxis para poder subir informacion a la base de datos
        $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "OK";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

    }

    //MODELO CONSULTA DE DATOS EN LA TABLA "REGISTROS"
    static public function mdlSeleccionarRegistros($tabla, $item, $valor) {

        //Si item y valor se encuentra vacios, mostrara TODOS los usuarios registrados en el sistema
        if ($item == null && $valor == null) {

            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla");
            //$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");
            
            $stmt->execute();
            
            //FetchAll, nos permite mostrar a todos los usuarios registrados en el sistema
            return $stmt->fetchAll();
        
        } else {
            
            //Si no, mostrara la informacion de un usuario en particular
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        }
    
    }

    //MODELO MODIFICAR DATOS EN LA TABLA "REGISTROS"
    static public function mdlActualizarRegistro($tabla, $datos) {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE token=:token");
    
            //NOTA: Esta es la forma en la que tenemos que escribir la sintaxis para poder subir informacion a la base de datos
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return "OK";
            } else {
                print_r(Conexion::conectar()->errorInfo());
            }
    
    }

    //MODELO ELIMINAR USUARIOS DE LA TABLA "REGISTROS"
	static public function mdlEliminarRegistro($tabla, $valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token = :token");

		$stmt->bindParam(":token", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "OK";

		} else {

			print_r(Conexion::conectar()->errorInfo());

		}

	}

}