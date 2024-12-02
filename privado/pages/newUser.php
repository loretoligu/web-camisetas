<?php
require "../classes/functions.php";
require "../classes/User.php";
require "../classes/Db.php";

use classes\User;
    
$user = new User();

if(isset($_GET["id"]) && !empty($_GET["id"])){
    $id = intval($_GET["id"]);        
    $user->getByID($id);
} 

if(isset($_POST) && !empty($_POST)){
    if($_POST["id"] == ""){
        $user->insert($_POST);
    header("Location: users.php");
    }else{
        $user->update($_POST["id"],$_POST);
        header("Location: users.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frikiland</title>
    <!-- Styles -->
    <link rel="stylesheet" href="../style/newUser.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/footer.css">
    <!-- Scripts -->
    <script src="../js/main.js"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php
        include"../includes/header.php";
    ?>
    <section>
        <div class="container">
            <div class="content">
                <div class="base">
                    <p>ALTA NUEVO USUARIO</p>
                </div>
                <form name="newUser" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">    
                    <div class="data">
                        <label>Nombre: </label>
                        <input type="text" name="name" placeholder="Nombre..." value="<?php echo $user->getName(); ?>">
                    </div>
                    <div class="data">
                        <label>Apellidos: </label>
                        <input type="text" name="surname" placeholder="Apellidos..." value="<?php echo $user->getSurname(); ?>">
                    </div>
                    <div class="data">
                        <label>Correo electrónico: </label>
                        <input type="mail" name="email" placeholder="Correo electrónico..." value="<?php echo $user->getEmail(); ?>">
                    </div>
                    <div class="data">
                        <label>Contraseña: </label>
                        <input type="password" name="password" placeholder="Contraseña..." value="<?php echo $user->getPassword(); ?>">
                    </div>
                    <div class="data">
                        <label>Permiso: </label>
                        <input type="text" name="permission" placeholder="Permiso..." value="<?php echo $user->getPermission(); ?>">
                    </div>
                    <button>Guardar</button>
                </form>         
                </div>
        </div>       
    </section>
    <?php
        include"../includes/footer.php";
    ?>
</body>
</html>