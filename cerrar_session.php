<?php
// Inicia una sesión
session_start();

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión actual
session_destroy();

// Redirecciona al archivo index.php para volver al formulario
header('Location: ./index.php');

// Termina el script para asegurarse de que no se ejecuten más instrucciones
exit();
?>