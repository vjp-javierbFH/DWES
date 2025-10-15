<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $generos = array("M", "F");
    for ($i = 0; $i < 100; $i++) {
        $generoAleatorio[$i] = $generos[rand(0,1)];
    }
    
    ?>
</body>

</html>