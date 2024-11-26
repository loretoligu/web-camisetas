<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frikiland</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../style/catalog.css">
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
                <div class="product">
                    <div class="picture">
                        <img class="shirt" src="../img/soyfriki.jpg">
                    </div>
                    <div class="especification">
                        <p>14€</p>
                        <p>Color</p>
                        <p>Talla</p>
                        <button>Comprar</button>
                    </div>
                </div>
                <div class="product">
                    <img>
                    <p>Talla</p>
                    <p>Color</p>
                    <p>Precio</p>
                </div>
                <div class="product">
                    <img>
                    <p>Talla</p>
                    <p>Color</p>
                    <p>Precio</p>
                </div>
            </div>
        </div>       
    </section>
    <?php
        include"../includes/footer.php";
    ?>
</body>
</html>