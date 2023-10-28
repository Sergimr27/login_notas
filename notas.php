<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
<?php
    session_start(); // Iniciar la sesión

    // Verificar si la variable de sesión 'username' está establecida (si el usuario ha iniciado sesión)
    if (isset($_SESSION['username'])) {

    // Incluye el archivo de conexión a la base de datos
    include_once("./conexion.php");

    // Obtén el nombre de usuario de la variable de sesión
    $username = $_SESSION['username'];

    // Consulta para obtener las notas del usuario
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

   // Verifica si se encontraron notas
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Notas de $username</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Asignatura</th><th>Nota</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Verifica si los índices existen antes de intentar acceder a ellos
            if (isset($row["asignatura"])) {
                echo "<td>" . $row["asignatura"] . "</td>";
            } else {
                echo "<td>No asignatura</td>";
            }
            if (isset($row["nota"])) {
                echo "<td>" . $row["nota"] . "</td>";
            } else {
                echo "<td>No nota</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
         // Agregar un botón para cerrar sesión
         echo "<br>";
         echo '<form action="cerrar_session.php" method="post">';
         echo '<input type="submit" value="Cerrar Sesión">';
         echo '</form>';
    } else {
        echo "<h2>No se encontraron notas para $username.</h2>";
    }
    // Cierra la conexión a la base de datos
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
    ?>
</body>
</html>






