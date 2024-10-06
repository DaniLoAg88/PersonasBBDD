<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta de personas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    include_once("conexion.php");
    $link = conectar();

    //INSERTAR en la BD:
    if(!empty($_POST["nombre"]) && !empty($_POST["apellidos"])){
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        // Le damos forma a la consulta:
        $insercion = "INSERT INTO datos (nombre, apellidos) VALUES ('$nombre', '$apellidos')";
        // Ejecutamos la consulta y la guardamos en la variable resultado(recibirá TRUE o FALSE)
        $resultado = mysqli_query($link, $insercion);

        if($resultado){
            echo "Alta realizada correctamente<br>";
        }else{
            echo "Error al insertar datos<br>";
        }
    }

    /* Mostrar las personas dadas de alta en la BD -- CONSULTA --*/
    $consulta = "SELECT * FROM datos";
    // Ejecutamos la consulta y la guardamos en la variable resultado(como es una consulta recibe los datos solicitados ARRAY)
    $resultado = mysqli_query($link, $consulta);
    while($fila = mysqli_fetch_assoc($resultado)){ //Ésta función te coge todos los datos recibidos de la BD y te lo separa en filas (registros)
        echo "<li>".$fila["nombre"]." ".$fila["apellidos"]."</li>";
    }

?>

    <hr>
    <div class="container">
    <h1>Alta de personas</h1>
    <form action="index.php" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos">
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
        <a href="update.php">Modificar o eliminar registros</a>
    </div>
</body>
</html>