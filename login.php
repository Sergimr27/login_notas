<?php
session_start(); // Iniciar la sesión

// Verificar si ambos campos del formulario se han enviado
if (isset($_POST["username"]) && isset($_POST["passwd"])) { 
    // Obtener el nombre de usuario y contraseña del formulario
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];
    //encriptamos la contraseña
    $pwdEncriptada = hash("sha256", $passwd);

    include_once("./conexion.php"); // Incluir el archivo de conexión a la base de datos
    //hacemos consulta sql
    $sql = "SELECT username, passwd, rol FROM usuarios WHERE username = ? AND passwd = ?";
    $stmt = mysqli_prepare($conn, $sql); // Preparar la consulta SQL
    mysqli_stmt_bind_param($stmt, "ss", $username, $pwdEncriptada); // Vincular el nombre de usuario a la consulta
    mysqli_stmt_execute($stmt); // Ejecutar la consulta
    $result = mysqli_stmt_get_result($stmt); // Obtener el resultado de la consulta

    // Verificar si se encontró un usuario con el nombre proporcionado
    if ($row = mysqli_fetch_assoc($result)) {
        //guardamos en variable valores de la bd
        $nombre = $row['username'];
        $password = $row['passwd'];
        $rol = $row['rol'];

        // Guardar el nombre de usuario en una variable de sesión
        $_SESSION['username'] = $nombre;
        //si el rol es estudiante
        if ($rol == "estudiante") {
            //creamos la 
            $_SESSION['datos'] =  'datos_alumno';
            header('Location: index.php'); // Redirigir a la página de inicio para estudiantes
        } else {
            // Comprobar si la contraseña ingresada coincide con la almacenada en la base de datos
            if (hash_equals($pwdEncriptada, $password)) {
                header('Location: notas.php'); // Redirigir a la página de notas
            } else {
                header('Location: index.php'); // Contraseña incorrecta, redirigir al inicio
            } 
            //cerramos stmt
            mysqli_stmt_close($stmt);
            mysqli_close($stmt); 
        }
    } else {
       
        //crear variable de session de datos si el usuario no existe en la bd
        $_SESSION['datos'] =  'si';
        // El usuario no existe en la base de datos, redirigir al inicio
        header('Location: index.php');
       
    }    
} else { // Si no se han proporcionado ambos campos y se intenta acceder por URL, no se permite el acceso
    
    header('Location: index.php');
} 
?>
