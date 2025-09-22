<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Escribe un programa que utilice las variables $x y $y. Asígnales los valores 166 y 999 respectivamente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división y la multiplicación. -->
    <?php
    $x = 166;
    $y = 999;
    echo "Valor de x: " . $x . "<br>";
    echo "Valor de y: " . $y . "<br>";
    echo "Suma -> " . ($x + $y) . "<br>";
    echo "Resta -> " . ($x - $y) . "<br>";
    echo "División -> " . ($x / $y) . "<br>";
    echo "Multiplicación -> " . ($x * $y) . "<br>";
    ?>
</body>

</html>