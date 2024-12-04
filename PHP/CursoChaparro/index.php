<?php
    require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HORARIOS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

$sql = "select * from cursos";

$resultados = mysqli_query($conexion, $sql);

$num_filas = mysqli_num_rows($resultados);

if($num_filas === 0){

    ?>
    
    <p>No hay cursos disponibles</p>

    <?php

}else{
?>
<h1>CURSOS</h1>
<a href="crear.php " class="boton" >Añadir nuevo curso</a>


<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Horario</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
        <th>Precio</th>
        <th>Acción</th>
    </tr>
    <?php
        while($fila = mysqli_fetch_assoc($resultados)){
            echo "<tr>";

            echo "<td>".$fila['codigo']."</td>";
            echo "<td>".$fila['nombre']."</td>";
            echo "<td>".$fila['horario']."</td>";
            echo "<td>".$fila['fecha_inicio']."</td>";
            echo "<td>".$fila['fecha_fin']."</td>";
            echo "<td>".$fila['precio']."</td>";
            echo '<td class="botones">
                <a href="editar.php?&id='.$fila["codigo"].'"><img src="./img/editar.svg"></a>
                <a href="index.php?ruta=curso&idB='.$fila["codigo"].'"><img src="./img/borrar.svg"></a>


            </td>';
       
            echo "</tr>";
        }
    ?>

</table>

<?php
}
?>

<?php

if(isset($_GET["idB"])){

    $id = $_GET["idB"];

    $sql = "DELETE FROM cursos WHERE codigo = $id";

    $respuesta = mysqli_query($conexion, $sql);

    if($respuesta){

        header("location:index.php");

    }else{
        echo "error";
    }
}
?>
</body>
</html>
