<?php

// Reportar errores de MySQL como excepciones

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Variables para la conexión a la base de datos

$dbserver = "localhost"; // Servidor de la base de datos
$dbusername = "root";    // Nombre
$dbpassword = "";        // Contraseña 
$dbbasedatos = "db_gestion_notas"; // Nombre

try {
    // Intentar establecer una conexión con la base de datos
    $conn = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbbasedatos);

    // Verificar si la conexión fue exitosa
    if (!$conn) {
        // Si la conexión falla, mostrar un mensaje de error y terminar el script
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

} catch (Exception $e) {
    // Si ocurre una excepción, mostrar un mensaje de error y terminar el script
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
    die();
}

?>