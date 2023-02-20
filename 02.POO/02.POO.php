<?php

//Capacitacion Dia #2: Martes - 14 - Febrero - 2023
//Dia de San Valentin (Dia del Amor y la Amistad)
//Cancion del dia: Phil Collins - In the air tonight

#Codigo a POO

//NOTA:
//En POO los objetos se empaquetan en clases,
//las cuales, son es un modelo que se utiliza para
//crear objetos que comparten un mismo
//comportamiento, estado y una misma identidad.

//RECOMENDACION:
//Declarar clases iniciando con letra mayuscula

//Declaracion de clases

class Automovil {

    //Declaracion de PROPIEDADES:
    //Las propiedades son las caracteristicas que puede tener un objeto.

    //private $marca;
    public $marca;
    public $modelo;

    //Declaracion de METODOS:
    //Un Metodo es un algoritmo asociado a un objeto de indica la capacidad de lo que este puede hacer.
    //Es decir, es una funcion que hace tareas con las propiedad que se le asigen.

    //DIFERENCIA ENTRE "FUNCION Y METODO":
    //La diferencia es que llamamos metodos a las funciones de una clase (dentro de la POO).
    //Mientras que llamamos funciones a los algoritmos de la programacion estructurada.

    public function mostrar() {

        echo "<p>Hola! soy un $this->marca, Modelo $this->modelo</p>";
    }

}

//Objeto:
//Es una entidad provista de metodos o mensajes a los cuales responde propiedades con valores concretos.

    $a = new Automovil();
    $a -> marca = "Toyota";
    $a -> modelo = "Corrolla";
    $a -> mostrar();

    $b = new Automovil();
    $b -> marca = "Hyundai";
    $b -> modelo = "Accent Vission";
    $b -> mostrar();

//PRINCIPIOS DE LA POO QUE SE CUMPLEN EN ESTE EJEMPLO:
//
//1. ABSTRACCION: Nuevos tipos de datos (el que tu quieras, tu lo creas).
//2. ENCAPSULACION: Organizar el codigo en grupo logicos.
//3. OCULTAMIENTO: Ocultar detalles de implementacion y exponer solo los detalles que sean necesarios para el resto del sistema.

?>