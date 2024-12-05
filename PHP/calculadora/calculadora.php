<?php
// calculadora.php

// Inicializar variables
$resultado = "";
$mensaje = "";

// Validar que los parámetros necesarios existan
if (isset($_GET['valor1'], $_GET['valor2'], $_GET['operacion'])) {
    // Almacenar los valores recibidos
    $valor1 = (float) $_GET['valor1'];
    $valor2 = (float) $_GET['valor2'];
    $operacion = $_GET['operacion'];

    // Definir las funciones de las operaciones
    function suma($a, $b) {
        return $a + $b;
    }

    function resta($a, $b) {
        return $a - $b;
    }

    function multiplicacion($a, $b) {
        return $a * $b;
    }

    function division($a, $b) {
        if ($b == 0) {
            return "Error: División por cero no permitida.";
        }
        return $a / $b;
    }

    // Seleccionar la operación a realizar
    switch ($operacion) {
        case 'suma':
            $resultado = suma($valor1, $valor2);
            break;
        case 'resta':
            $resultado = resta($valor1, $valor2);
            break;
        case 'multiplicacion':
            $resultado = multiplicacion($valor1, $valor2);
            break;
        case 'division':
            $resultado = division($valor1, $valor2);
            break;
        default:
            $resultado = "Operación no válida.";
    }

    // Preparar el mensaje para mostrar en index.php
    $mensaje = "El resultado de la $operacion entre $valor1 y $valor2 es: $resultado";
}

// Redirigir de nuevo a index.php con el resultado
header("Location: index.php?mensaje=" . urlencode($mensaje));
exit;
?>
