<?php

function uploadPic($picFolder,$folder,$maxSize){
    $route = "";
    $fileName = $picFolder['name'];
    $type = $picFolder['type'];
    $size = $picFolder['size'];

    // Only jpeg or png
    if((strpos($type, "jpeg") || strpos($type, "png")) && $size < $maxSize ){
        $fileName = remove_special($fileName);
        echo "Dentro tipo";
        // Check if file exists with same name
        if(file_exists($folder.$fileName)){
            $NameCut = cutFinalString($fileName);
            $randomNumber = time();

            if(strpos($type, "jpeg")){
                $extension = ".jpg";
            }else{
                $extension = ".png";
            }
            $fileName = $NameCut."_".$randomNumber.$extension;
        }
        if(move_uploaded_file($picFolder['tmp_name'], $folder.$fileName)){
            $route = $fileName;
            echo "Dentro copiado";
        }else{
            echo "<script>alert('No se ha podido guardar el archivo. Contacte con el administrador')</script>";
        }
    }else{
        echo "<script>alert('No es un formato de imagen permitido o tiene un tamaño superior al permitido')</script>";
        $route = null;
    }

    return $route;
}


function remove_special($name){
    $name = utf8_decode($name);

    $name = str_replace(
        array('?', '¿'),
        array('_', '_'),
        $name
    );

    $name = str_replace(
        array(' '),
        array('_'),
        $name
    );

    $name = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $name
    );

    $name = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $name 
    );

    $name = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $name 
    );

    $name = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $name 
    );

    $name = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $name 
    );

    $name = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $name
    );

    $name = str_replace(
        array('!', '¡'),
        array('_', '_'),
        $name
    );

    return $name;
}


function cutFinalString($name, $character = "."){
    $positionSub = strrpos ($name, $character);
    $finalName = substr ($name, 0, ($positionSub));
    return $finalName;

}