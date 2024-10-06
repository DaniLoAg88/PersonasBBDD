<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar personas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
            <?php
            include_once("conexion.php");
            $link = Conectar();

            //Antes de mostrar los datos compruebo si estoy borrando o editando:
            if(!empty($_GET["opcion"]) && $_GET["opcion"] == "borrar"){
                $id = $_GET["id"];
                $borrar = "DELETE FROM datos WHERE id=$id";
                $resultado  = mysqli_query($link,$borrar);
                if($resultado){
                    echo "El registro se borro correctamente";
                }else{
                    echo "El registro no se borro correctamente";
                }
            }

            //Ahora mostramos los datos que tenemos en la BD
            $sql = "SELECT * FROM datos";
            $resultado = mysqli_query($link, $sql);

            while($fila = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                    echo "<td>".$fila["id"]."</td>";
                    if(!empty($_GET["opcion"]) && $_GET["opcion"] == "editar"){
                        if($_GET["id"] == $fila["id"]){
                            echo "<form action='lecturaEditar.php' method='POST'>";
                            echo "<td><input type='text' name='nombre' id='nombre' value=".$fila["nombre"]."></td>";
                            echo "<td><input type='text' name='apellidos' id='apellidos' value=".$fila['apellidos']."></td>";
                            echo "<td><input type='submit' value='Actualizar'></td>";
                            echo "<td><input type='text' hidden name='id' id='id' value=".$fila["id"]."></td>";
                            echo "</form>";
                        }else{
                            echo "<td>".$fila["nombre"]."</td>";
                            echo "<td>".$fila["apellidos"]."</td>";
                        }
                    }else{
                        echo "<td>".$fila["nombre"]."</td>";
                        echo "<td>".$fila["apellidos"]."</td>";
                        echo "<td><a href='update.php?opcion=borrar&id=".$fila["id"]."'>Borrar</a></td>";
                        echo "<td><a href='update.php?opcion=editar&id=".$fila["id"]."'>Editar</a></td>";
                    }
                echo "</tr>";
            }

            echo "<tr><td colspan='4' style='text-align: center'><a href='index.php'>Volver al principio</a></td></tr>"

            ?>
        </table>
    </div>
</body>
</html>