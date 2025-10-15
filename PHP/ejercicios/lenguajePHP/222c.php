echo "Calcular potencia utilizando do-while<br>"

<?php

$base = 5;
$exponente = 3;
$resultado = 1;

do {
    $resultado *= $base;
    $i++;
} while ($i < $exponente);

echo "El resultado de ".$base." elevado a la ".$exponente." es -> " .$resultado;

?>