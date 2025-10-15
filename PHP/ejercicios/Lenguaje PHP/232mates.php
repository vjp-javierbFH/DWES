<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $numerosAleatiros = [];
    for ($i = 0; $i < 33; $i++) {
        $numerosAleatiros[] = rand(0, 100);
    }

    $mayor = max($numerosAleatiros);
    $menor = min($numerosAleatiros);
    $media = array_sum($numerosAleatiros) / count($numerosAleatiros);

    foreach($numerosAleatiros as $indice => $numero){
        print($indice. " = " .$numero);
        print("<br>");
    }

    echo "Mayor: " .$mayor. "<br>Menor: " .$menor. "<br>Media: " .$media

    ?>
</body>

</html>