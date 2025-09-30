<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for($i=0; $i < 50; $i++){
        $numeros[] = rand(0,99);
    }
    sort($numeros);
    // print_r($numeros);
    foreach($numeros as $indice => $numero){
        print($indice. " : " .$numero);
        print("<br>");
    }
    ?>
</body>
</html>