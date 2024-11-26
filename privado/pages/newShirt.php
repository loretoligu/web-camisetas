<?php
    require "../classes/functions.php";
    require "../classes/Shirt.php";
    require"../classes/Db.php";
    use classes\Shirt;
    
    if(isset($_POST) && !empty($_POST)){
        $shirt = new Shirt();
        $shirt->insert($_POST,$_FILES["picture"]);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frikiland</title>
    <!-- Styles -->
    <link rel="stylesheet" href="../style/newShirt.css">
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
                    <p>ALTA NUEVA CAMISETA</p>
                </div>
                <form name="newShirt" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
                    <div class="data">
                        <label>Referencia: </label>
                        <input type="text" name="ref" placeholder="Escriba la referencia...">
                    </div>
                    <div class="data">
                        <label>Color: </label>
                        <input type="color" name="color">
                    </div>
                    <div class="data">
                    <label>Precio: </label>
                    <input type="text" name="price" placeholder="Introduzca el precio...">
                    </div>
                    <div class="data">
                        <label>Talla: </label>
                        <select name="size">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="data">
                        <label>Tematica: </label>
                        <input type="text" name="category" placeholder="Introduzca la temática...">
                    </div>
                    <div class="data">
                        <label>Foto: </label>
                        <input type="file" name="picture">
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