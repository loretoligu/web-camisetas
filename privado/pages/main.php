<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frikiland</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../style/main.css">
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
                <div class="question">
                    <p>¿Qué necesitas hacer?</p>
                </div>
                <div class="options">
                    <div class="categories">
                        <p>Productos</p>
                        <a href="newShirt.php">Dar de alta un nuevo producto</a>
                        <a>Modificar producto</a>
                        <a href="catalog.php">Ver catálogo productos</a>
                    </div>
                    <div class="categories">
                        <p>Temáticas</p>
                        <a href="newCategory.php">Dar de alta una nueva temática</a>
                        <a>Modificar temática</a>
                        <a href="categories.php">Ver temáticas</a>
                    </div>
                    <div class="categories">
                        <p>Usuarios</p>
                        <a href="newShirt.php">Dar de alta un nuevo usuario</a>
                        <a>Modificar usuario</a>
                        <a href="catalog.php">Ver usuarios</a>
                    </div>
                </div>
            </div>
        </div>       
    </section>
    <?php
        include"../includes/footer.php";
    ?>
</body>
</html>