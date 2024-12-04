<?php
    require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(isset($_POST["nombre"])){
    $nombreCurso = $_POST["nombre"];
    $horariosCurso = $_POST["horario"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $precio = $_POST["precio"];


    // Escapar los valores para prevenir inyección SQL
    $nombreCurso = mysqli_real_escape_string($conexion, $nombreCurso);
    $horariosCurso = mysqli_real_escape_string($conexion, $horariosCurso);
    $fechaInicio = mysqli_real_escape_string($conexion, $fechaInicio);
    $fechaFin = mysqli_real_escape_string($conexion, $fechaFin);
    $precio = mysqli_real_escape_string($conexion, $precio);

    $sql = "INSERT INTO cursos (nombre, horario, fecha_inicio, fecha_fin, precio) 
            VALUES ('$nombreCurso', '$horariosCurso', '$fechaInicio', '$fechaFin', '$precio')";

    $resultados = mysqli_query($conexion, $sql);

    if($resultados){
        echo "<p>Curso agregado correctamente.</p>";
        header("Location: index.php");


    } else {
        echo "<p>Error al agregar el curso: " . mysqli_error($conexion) . "</p>";
    }
}
?>

    <div class="cabecera" >
        <h1>Agrega un nuevo curso</h1>
        <a href="index.php" class="boton">REGRESAR</a>
    </div>

        <form action="crear.php" method="post">
            <fieldset class="flex-form">
                <div class="flex-labels">
                    <label for="Nombre">Nombre del curso</label>
                    <input type="text" name="nombre">
                </div>
                <div class="flex-labels">
                    <label for="Horario">Horario del curso</label>
                    <input type="text" name="horario">
                </div>
                <div class="flex-labels">
                    <label for="FechaInicio">Seleccione fecha de inicio</label>
                    <input type="date" name="fechaInicio" id="1">
                </div>
                <div class="flex-labels">
                    <label for="fechaFin">Seleccione fecha de finalización</label>
                    <input type="date" name="fechaFin" id="2">
                </div>
                <div class="flex-labels">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio">
                </div>
                <div class="boton-abajo">
                    <button type="submit" class="boton">Enviar</button>
                </div>
            </fieldset>
        </form>
</body>

</html>