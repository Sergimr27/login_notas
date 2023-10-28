<?php
//inciamos session
session_start();
//si el campo $_SESSION['datos'] esta relleno
if (isset($_SESSION['datos'])) {
    //lo guarda en una variable 
    $datosMal = $_SESSION['datos'];

}else{
    //guarda el campo vacío
    $datosMal = " ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login - Gestión de Notas</title>
    </head>
    <body>
    <div class="header1">
        <h1 class="login-title">Bienvenidos a la Plataforma de Gestión de Notas</h1>
    </div>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="./img/j23.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container mt-5">
        <div class="login-container">
            <div class="logo">
                <img src="./img/logo.png" alt="Logo">
            </div>
            <h2 class="login-title">Iniciar Sesión</h2>
            <form id="login-form" action="login.php" method="post" onsubmit="return validarPassword()">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario:</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?php if(isset($_GET['username'])) {echo $_GET['username'];} ?>">
                    <br>
                    <label for="validacionUser" id="errorU" class="error_rojo"></label>
                </div>
                <div class="mb-3">
                    <label for="passwd" class="form-label">Contraseña:</label>
                    <input type="password" id="passwd" name="passwd" class="form-control" value="<?php if(isset($_GET['passwd'])) {echo $_GET['passwd'];} ?>">
                    <br>
                    <label for="validacionPWD" id="errorP" class="error_rojo"></label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
    <p>&copy; 2023 Los Magic - Todos los derechos reservados</p>
    <div class="social-icons">
        <a href="https://twitter.com/facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://twitter.com/linkedin"><i class="fab fa-linkedin"></i></a>
        <a href="https://instagram.com/jesuitesbellvitge"><i class="fab fa-instagram"></i></a>
    </div>
</div>
    <script src="mainJS.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    //si $datosMal = si, salta script que dice que el usuario y la contra no coinciden
    if ($datosMal =='si'){
        echo "<script>var errorU = document.getElementById('errorU');errorU.textContent = 'El usuario y la contraseña no coinciden';</script>";
    }
    //Si $datosMal = 'datos_alumno', salta script que dice que eres alumno y no te deja pasar
    if ($datosMal == 'datos_alumno') {
        echo "<script>var errorU = document.getElementById('errorU');errorU.textContent = 'Eres un alumno, no tienes permisos';</script>";
    }
    //cerramos sesión
    session_unset();
    session_destroy();
    ?>
</body>
</html>



