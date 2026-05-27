<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Asistentes</title>
</head>
<body>

    <h2>Registro de Asistentes al Taller</h2>
    
    <form action="" method="POST">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required placeholder=" ">
        <button type="submit" name="registrar">Registrar Asistente</button>
    </form>

    <hr>

    <?php
    // Procesar el formulario cuando se envía mediante POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
        
        // Limpiamos el texto recibido para evitar espacios extraños
        $nuevoNombre = trim($_POST['nombre']);
        $nombreArchivo = "asistentes.txt";

        if (!empty($nuevoNombre)) {
            try {
                // Usamos el modo "a" (append) para añadir sin borrar los anteriores
                $RArchivo = fopen($nombreArchivo, "a");

                if (!$RArchivo) {
                    throw new Exception("No se pudo abrir el archivo para registrar.");
                }

                // Escribimos el nombre ingresado por el usuario
                fwrite($RArchivo, $nuevoNombre . PHP_EOL);
                
                // Cerramos el flujo
                fclose($RArchivo);

                echo "<p style='color: green;'><strong>¡Éxito!</strong> El asistente '$nuevoNombre' fue registrado correctamente.</p>";

            } catch (Exception $e) {
                echo "<p style='color: red;'>Ocurrió un error: " . $e->getMessage() . "</p>";
            }
        }
    }
    ?>

    <h3>Asistentes registrados actualmente:</h3>
    <pre><?php
        // Código extra opcional para mostrar los nombres actuales en la página
        if (file_exists("asistentes.txt")) {
            echo htmlspecialchars(file_get_contents("asistentes.txt"));
        } else {
            echo "Aún no hay asistentes registrados.";
        }
    ?></pre>

</body>
</html>


