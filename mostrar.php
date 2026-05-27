<?php
// Script: mostrar.php
// Este script lee un archivo de texto y muestra los nombres de los asistentes en una lista numerada 

$archivo = "asistentes.txt"; // Se corrigió agregando el signo '=' faltante 

try {
    // Verifica si el archivo existe 
    if (!file_exists($archivo)) {
        throw new Exception("El archivo no existe."); 
    }

    // Abrir el archivo para lectura ("r") 
    $fp = fopen($archivo, "r"); 

    // Si no se pudo abrir el archivo, lanzamos una excepción 
    if (!$fp) {
        throw new Exception("No se pudo abrir el archivo para lectura."); 
    }

    // Leer el archivo línea por línea y mostrar los nombres 
    $contador = 1; 
    
    // Se corrigió incluyendo la lógica dentro del ciclo while 
    while (!feof($fp)) {
        // Leemos una línea del archivo 
        $linea = fgets($fp); 
        
        // Limpiamos espacios en blanco y saltos de línea con trim()
        $nombreLimpio = trim($linea);
        
        // Validamos que la línea no esté vacía antes de imprimir (evita registrar líneas en blanco al final)
        if ($nombreLimpio !== "") {
            // htmlspecialchars() para evitar problemas de seguridad con HTML 
            echo $contador . ". " . htmlspecialchars($nombreLimpio) . "<br>"; 
            $contador++; 
        }
    }

    // Cerramos el flujo del archivo 
    fclose($fp); 

} catch (Exception $e) {
    // Se corrigió agregando el punto (.) para la concatenación 
    echo "Error: " . $e->getMessage(); 
}
?>