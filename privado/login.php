<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style/login.css">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"></head>
<body>
    <div class="container">
            <div class="login">
                <p>Inicio de sesión</p>
            </div>
            <form class="form" name="login" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                <div class="usr">
                    <p>Nombre de usuario</p>
                    <input type="text" name="user" placeholder="Usuario...">
                    <span class="material-icons">person</span>
                </div>
                <div class="pw">
                    <p>Contraseña</p>
                    <input type="password" name="pass" placeholder="Contraseña...">
                    <span class="material-icons">lock</span>
                </div>
                <button>Acceder</button>
            </form>
            <a href="main.html">
                <img class="logo" src="img/Logo-tienda.jpg" alt="logo">
            </a>            
    </div>
</body>
</html>