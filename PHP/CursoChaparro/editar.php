<?php
    require 'conexion.php';
    // Verificar si se envió el ID del curso a editar
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Asegúrate de convertirlo a entero para evitar inyecciones

    // Consulta para obtener los datos del curso
    $sql = "SELECT * FROM cursos WHERE codigo = $id";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $curso = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Error: El curso no existe.</p>";
        exit;
    }

    }
    // Actualizar los datos del curso si el formulario se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCurso = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $horariosCurso = mysqli_real_escape_string($conexion, $_POST['horario']);
    $fechaInicio = mysqli_real_escape_string($conexion, $_POST['fechaInicio']);
    $fechaFin = mysqli_real_escape_string($conexion, $_POST['fechaFin']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);

    // Consulta para actualizar los datos del curso
    $sql = "UPDATE cursos 
            SET nombre = '$nombreCurso', 
                horario = '$horariosCurso', 
                fecha_inicio = '$fechaInicio', 
                fecha_fin = '$fechaFin', 
                precio = '$precio' 
            WHERE codigo = $id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
    } else {
        echo "<p>Error al actualizar el curso: " . mysqli_error($conexion) . "</p>";
    }
}
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

    <div class="cabecera" >
        <h1>Editar curso</h1>
        <a href="index.php" class="boton">REGRESAR</a>
    </div>

    <form action="" method="post">
        <fieldset class="flex-form">
            <div class="flex-labels">
                <label for="Nombre">Nombre del curso</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($curso['nombre']); ?>" required>
            </div>
            <div class="flex-labels">
                <label for="Horario">Horario del curso</label>
                <input type="text" name="horario" value="<?php echo htmlspecialchars($curso['horario']); ?>" required>
            </div>
            <div class="flex-labels">
                <label for="FechaInicio">Seleccione fecha de inicio</label>
                <input type="date" name="fechaInicio" value="<?php echo $curso['fecha_inicio']; ?>" required>
            </div>
            <div class="flex-labels">
                <label for="fechaFin">Seleccione fecha de finalización</label>
                <input type="date" name="fechaFin" value="<?php echo $curso['fecha_fin']; ?>" required>
            </div>
            <div class="flex-labels">
                <label for="precio">Precio</label>
                <input type="text" name="precio" value="<?php echo $curso['precio']; ?>" required>
            </div>
            <div class="boton-abajo">
                <button type="submit" class="boton">Actualizar</button>
            </div>
        </fieldset>
    </form>
</body>
</html>