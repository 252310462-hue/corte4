<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Asistentes</title>
</head>
<body>

    <h2>Lista Oficial de Asistentes Registrados</h2>

    <?php
    $archivo = "asistentes.txt";

    try {
        // Verificar si el archivo existe antes de intentar cualquier acción 
        if (!file_exists($archivo)) {
            throw new Exception("El archivo '$archivo' aún no ha sido creado o no contiene registros.");
        }

        // Abrir el archivo en modo lectura 
        $fp = fopen($archivo, "r");

        if (!$fp) {
            throw new Exception("No se pudo abrir el archivo para lectura."); 
        }

        // Iniciamos la etiqueta de lista ordenada HTML (<ol>) 
        echo "<ol>"; 

        // Recorremos el archivo línea por línea hasta el final 
        while (!feof($fp)) {
            $linea = fgets($fp); 
            $nombreLimpio = trim($linea);

            // Solo imprimimos si la línea contiene texto real
            if ($nombreLimpio !== "") {
                // Cada asistente se envuelve dentro de etiquetas de elemento de lista (<li>)
                echo "<li>" . htmlspecialchars($nombreLimpio) . "</li>"; 
            }
        }

        // Cerramos la etiqueta de lista ordenada HTML
        echo "</ol>";

        // Cerramos el archivo 
        fclose($fp); 

    } catch (Exception $e) {
        // Renderizamos el error de forma amigable para el usuario 
        echo "<p style='color: red; font-weight: bold;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    ?>

</body>
</html>