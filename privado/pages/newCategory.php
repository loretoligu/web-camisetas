<?php
require "../classes/functions.php";
require "../classes/Category.php";
require"../classes/Db.php";
use classes\Category;

$category = new Category();

if(isset($_GET["id"]) && !empty($_GET["id"])){
    $id = intval($_GET["id"]);        
    $category->getByID($id);
}

if(isset($_POST) && !empty($_POST)){
    if($_POST["id"] == ""){
        $category->insert($_POST);
        header("Location: categories.php");
    }else{
        $category->update($_POST["id"],$_POST);
        header("Location: categories.php");
    }   
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="../style/newCategory.css">
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
    <title>Document</title>
</head>
<body>
<?php
        include"../includes/header.php";
    ?>
    <section>
        <div class="container">
            <div class="content">
                <div class="base">
                    <p>ALTA NUEVA TEMÁTICA</p>
                </div>
                <form name="newCategory" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $category->getId(); ?>"> 
                    <div class="data">
                        <label>Nombre: </label>
                        <input type="text" name="name" placeholder="Escriba el nombre..." value="<?php echo $category->getName(); ?>">
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