<?php
// Script: registro.php 
// Arreglo de nombres de asistentes 
$nombres = [
    "Alan Favila", 
    "Juan carlos", 
    "Carlos García", 
    "Itzel Nava", 
    "Diana Garcia" 
];

// Nombre del archivo donde se guardarán los nombres
$nombreArchivo = "asistentes.txt"; 

try { 
    // Tratamos de abrir el archivo para escritura ("w") 
    // Si el archivo no existe, se creará automáticamente 
    $RArchivo = fopen($nombreArchivo, "w"); 

    // Si no se pudo abrir el archivo, lanzamos una excepción 
    if (!$RArchivo) { 
        throw new Exception("No se pudo abrir el archivo."); 
    }

    // Escribir nombres en el archivo
    foreach ($nombres as $nombre) { 
        // Concatenamos el nombre con PHP_EOL para el salto de línea 
        fwrite($RArchivo, $nombre . PHP_EOL); 
    } 

    // Al finalizar, cerramos el archivo correctamente 
    fclose($RArchivo); 
    echo "Archivo creado y nombres escritos correctamente.<br>"; 

} catch (Exception $e) {
    // Se corrigió agregando el punto (.) para concatenar el mensaje de error 
    echo "Ocurrió un error: " . $e->getMessage(); 
}
?>



