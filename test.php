<?php

 
$source=$_SERVER['DOCUMENT_ROOT'].'\pfe\uploads\Atelier_3_2021-2022.pdf[0]';
$image = new Imagick($source);
echo($_SERVER['DOCUMENT_ROOT']);
 echo($_SERVER['PHP_SELF']);
// Si 0 est fourni comme paramètre de hauteur ou de largeur,
// les proportions seront conservées
$image->setResolution(50, 50);
$image->writeImage( $_SERVER['DOCUMENT_ROOT'].'\pfe\uploads\Atelier_3_2021-2022.png' );
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="file" name="file">
    </form>
    <img 
</body>
</html>