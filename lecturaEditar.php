<?php
    include_once("conexion.php");
    $link = Conectar();

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];

    $actualizar = "UPDATE datos SET "."nombre"." = '$nombre', "."apellidos"." = '$apellidos' WHERE id = $id";
    $resultado  = mysqli_query($link,$actualizar);

    if($resultado){
        echo "El registro se actualizó correctamente";
        header('Location: update.php');
    }else{
        echo "El registro no se actualizó correctamente";
    }

