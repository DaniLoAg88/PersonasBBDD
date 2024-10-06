<?php
/* ESTE ARCHIVO CONTIENE LO NECESARIO PARA REALIZAR UNA CONEXIÓN CON LA BASE DE DATOS PERSONAS Y REALIZAR CRUD */

// 1. Definir los parámetros de conexión
$servidor = "localhost"; // Nombre del servidor
$usuario = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
$puerto = "3306"; // Puerto del servidor
$bbdd = "personas"; // Nombre de la BD

// 2. Crear la conexión
// En éste caso vamos a meterlo en una función
function conectar(){
    global $servidor, $usuario, $password, $bbdd, $puerto;
    $conexion = mysqli_connect($servidor.":".$puerto, $usuario, $password, $bbdd);

    //Verificar si se conecta a la BD
    if(mysqli_error($conexion)){
        echo "Error al conectar a la base de datos<br>";
    }else{
        echo "Conexión realizada correctamente<br>";
    }

    //Verificar si conecta con la tabla
    if(!mysqli_select_db($conexion, $bbdd)){
        echo "Error al conectar a la base de datos<br>";
        exit();
    }else{
        echo "Conexión realizada correctamente<br>";
    }

    return $conexion;
}

//$conexion = conectar();
