<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora</title>
</head>
<body>
    <main class="flex-body">
        <div class="titulo">
            <h1>CALCULADORA EN LÍNEA</h1>
       
        </div>
        <div class="container">
       
            <form class="form flex-body" action="calculadora.php" method="get">
            <label for="valor1">Agregue el primer valor:</label>
                <input id="valor1" name="valor1" type="number" placeholder="Agrega un número" required>

                <label for="valor2">Agregue el segundo valor:</label>
                <input id="valor2" name="valor2" type="number" placeholder="Agrega un número" required>

                <label for="op">Seleccione una operación:</label>
                <select name="operacion" id="op" required>
                    <option value="" disabled selected>Seleccione una operación</option>
                    <option value="suma">Suma</option>
                    <option value="resta">Resta</option>
                    <option value="multiplicacion">Multiplicación</option>
                    <option value="division">División</option>
                </select>

                <button type="submit" class="boton">Calcular</button>
            </form>
        </div>
        <div>
            <?php if (isset($_GET['mensaje'])): ?>
                <p class="resultado">Resultado: <?php echo htmlspecialchars($_GET['mensaje']); ?></p>
            <?php endif; ?>
        </div>

    </main>
</body>
</html>